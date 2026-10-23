<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * InstagramService
 *
 * Menghubungi Instagram Basic Display API untuk mengambil postingan
 * dan foto profil vendor melalui Instagram Graph API.
 *
 * ─── Credential yang dibutuhkan (isi di .env) ───────────────────────────────
 *
 *   INSTAGRAM_ACCESS_TOKEN=<Long-Lived Access Token akun Instagram bisnis/creator>
 *   INSTAGRAM_APP_ID=<App ID dari Meta Developer Dashboard>
 *   INSTAGRAM_APP_SECRET=<App Secret dari Meta Developer Dashboard>
 *
 * ─── Cara mendapatkan token ─────────────────────────────────────────────────
 *   1. Buat App di https://developers.facebook.com
 *   2. Tambahkan produk "Instagram Basic Display" atau "Instagram Graph API"
 *   3. Generate Short-Lived Token → tukar ke Long-Lived Token (60 hari)
 *   4. Untuk foto profil vendor (Basic Display API):
 *      Setiap vendor perlu otorisasi akun mereka sendiri dan memberikan token.
 *      Simpan token vendor di kolom vendors.instagram_user_id (placeholder untuk implementasi OAuth penuh).
 *
 * ─── Base URL API ────────────────────────────────────────────────────────────
 *   Basic Display: https://graph.instagram.com/
 *   Graph API    : https://graph.facebook.com/v21.0/
 */
class InstagramService
{
    protected string $accessToken;
    protected string $baseUrl = 'https://graph.instagram.com';
    protected string $graphUrl = 'https://graph.facebook.com/v21.0';

    public function __construct()
    {
        $this->accessToken = config('instagram.access_token', '');
    }

    /**
     * Ekstrak username Instagram dari URL atau handle.
     * Contoh: "https://www.instagram.com/kembarkencanaplanner/" -> "kembarkencanaplanner"
     */
    public static function extractUsernameFromUrl(?string $url): ?string
    {
        if (empty($url)) {
            return null;
        }

        $url = trim($url);

        // Jika diawali @
        if (strpos($url, '@') === 0) {
            return ltrim($url, '@');
        }

        // Jika URL
        if (filter_var($url, FILTER_VALIDATE_URL) || str_contains($url, 'instagram.com')) {
            $path = parse_url($url, PHP_URL_PATH);
            if ($path) {
                $segments = array_values(array_filter(explode('/', $path)));
                if (!empty($segments[0])) {
                    // Hindari reserved paths seperti 'p', 'reel', 'stories'
                    if (!in_array(strtolower($segments[0]), ['p', 'reel', 'reels', 'stories', 'explore', 'tv'])) {
                        return ltrim($segments[0], '@');
                    }
                }
            }
        }

        // Single word handle
        if (preg_match('/^[a-zA-Z0-9._]+$/', $url)) {
            return $url;
        }

        return null;
    }

    // ══════════════════════════════════════════════════════════════════════════
    // POSTINGAN KEMBAR KENCANA
    // ══════════════════════════════════════════════════════════════════════════

    /**
     * Ambil daftar postingan media dari akun utama Kembar Kencana.
     * Menggunakan endpoint /me/media dari Basic Display API.
     *
     * @param  int  $limit  Jumlah postingan (maks 100)
     * @return array        Array of media objects, atau [] jika gagal
     */
    public function fetchRecentPosts(int $limit = 12): array
    {
        if (empty($this->accessToken)) {
            Log::warning('[Instagram] INSTAGRAM_ACCESS_TOKEN belum diisi di .env');
            return [];
        }

        try {
            $response = Http::timeout(15)->get("{$this->baseUrl}/me/media", [
                'fields'       => 'id,media_type,media_url,thumbnail_url,permalink,caption,timestamp',
                'limit'        => $limit,
                'access_token' => $this->accessToken,
            ]);

            if ($response->failed()) {
                Log::error('[Instagram] Gagal ambil postingan: ' . $response->body());
                return [];
            }

            return $response->json('data', []);

        } catch (\Throwable $e) {
            Log::error('[Instagram] Exception fetchRecentPosts: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Refresh Long-Lived Token (perlu dipanggil sebelum 60 hari).
     * Jalankan setiap bulan via Scheduler / manual.
     *
     * @return string|null Token baru jika berhasil
     */
    public function refreshLongLivedToken(): ?string
    {
        if (empty($this->accessToken)) {
            return null;
        }

        try {
            $response = Http::timeout(15)->get("{$this->baseUrl}/refresh_access_token", [
                'grant_type'   => 'ig_refresh_token',
                'access_token' => $this->accessToken,
            ]);

            if ($response->successful()) {
                $newToken = $response->json('access_token');
                Log::info('[Instagram] Token berhasil di-refresh. Harap update INSTAGRAM_ACCESS_TOKEN di .env.');
                return $newToken;
            }

            Log::error('[Instagram] Gagal refresh token: ' . $response->body());
            return null;

        } catch (\Throwable $e) {
            Log::error('[Instagram] Exception refreshToken: ' . $e->getMessage());
            return null;
        }
    }

    // ══════════════════════════════════════════════════════════════════════════
    // FOTO PROFIL VENDOR
    // ══════════════════════════════════════════════════════════════════════════

    /**
     * Ambil URL foto profil untuk akun Instagram (Basic Display API).
     *
     * Catatan: Basic Display API TIDAK menyediakan profile picture.
     * Untuk foto profil vendor, ada dua opsi:
     *
     * Opsi A (Diimplementasikan di sini):
     *   Gunakan endpoint tidak resmi: https://i.instagram.com/api/v1/users/web_profile_info/?username=<handle>
     *   Ini bekerja tanpa token tapi bisa berubah sewaktu-waktu oleh Instagram.
     *
     * Opsi B (Lebih stabil, perlu Instagram Graph API dengan akun Business):
     *   GET https://graph.facebook.com/v21.0/{ig-user-id}?fields=profile_picture_url&access_token={page-token}
     *
     * @param  string  $username  Username Instagram tanpa '@'
     * @return string|null        URL foto profil, atau null jika gagal
     */
    public function fetchVendorProfilePicture(string $username): ?string
    {
        $username = ltrim($username, '@');

        // ── Opsi A: Web Profile Info (tanpa token, tidak resmi) ───────────────
        try {
            $response = Http::withHeaders([
                'User-Agent'      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
                'x-ig-app-id'     => config('instagram.app_id', '936619743392459'),
                'Accept'          => '*/*',
                'Accept-Language' => 'en-US,en;q=0.9',
            ])->timeout(10)->get('https://i.instagram.com/api/v1/users/web_profile_info/', [
                'username' => $username,
            ]);

            if ($response->successful()) {
                $pic = $response->json('data.user.profile_pic_url_hd')
                    ?? $response->json('data.user.profile_pic_url');

                if ($pic) {
                    return $pic;
                }
            }
        } catch (\Throwable $e) {
            Log::warning("[Instagram] Opsi A gagal untuk @{$username}: " . $e->getMessage());
        }

        // ── Opsi B: Graph API (perlu Business Account + Page Token) ───────────
        // Uncomment dan isi vendor->instagram_user_id jika menggunakan Graph API
        //
        // $pageToken = config('instagram.page_token', '');
        // if ($pageToken && $igUserId) {
        //     $response = Http::get("{$this->graphUrl}/{$igUserId}", [
        //         'fields'       => 'profile_picture_url',
        //         'access_token' => $pageToken,
        //     ]);
        //     if ($response->successful()) {
        //         return $response->json('profile_picture_url');
        //     }
        // }

        return null;
    }
}
