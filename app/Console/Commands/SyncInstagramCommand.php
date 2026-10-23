<?php

namespace App\Console\Commands;

use App\Models\InstagramPost;
use App\Models\Vendor;
use App\Services\InstagramService;
use Illuminate\Console\Command;

class SyncInstagramCommand extends Command
{
    /**
     * Nama dan deskripsi perintah artisan.
     */
    protected $signature = 'instagram:sync
                            {--posts : Sinkronisasi postingan Kembar Kencana}
                            {--vendors : Sinkronisasi foto profil vendor}
                            {--refresh-token : Refresh Long-Lived Access Token}
                            {--all : Jalankan semua sinkronisasi (default)}';

    protected $description = 'Sinkronisasi data Instagram: postingan & foto profil vendor';

    public function __construct(protected InstagramService $instagram)
    {
        parent::__construct();
    }

    /**
     * Jalankan perintah.
     */
    public function handle(): int
    {
        $runAll     = $this->option('all') || (!$this->option('posts') && !$this->option('vendors') && !$this->option('refresh-token'));
        $runPosts   = $runAll || $this->option('posts');
        $runVendors = $runAll || $this->option('vendors');
        $runRefresh = $this->option('refresh-token');

        if ($runRefresh) {
            $this->refreshToken();
        }

        if ($runPosts) {
            $this->syncPosts();
        }

        if ($runVendors) {
            $this->syncVendorProfilePics();
        }

        $this->info('✅ Sinkronisasi Instagram selesai.');
        return Command::SUCCESS;
    }

    // ──────────────────────────────────────────────────────────────────────────

    /**
     * Sinkronisasi postingan ke tabel instagram_posts.
     * Postingan yang sudah ada (sama instagram_id) tidak akan diduplikasi.
     */
    protected function syncPosts(): void
    {
        $this->info('📸 Mengambil postingan Instagram...');

        $limit = (int) config('instagram.fetch_limit', 12);
        $posts = $this->instagram->fetchRecentPosts($limit);

        if (empty($posts)) {
            $this->warn('   ⚠️  Tidak ada postingan yang diterima. Periksa INSTAGRAM_ACCESS_TOKEN di .env');
            return;
        }

        $synced = 0;
        foreach ($posts as $post) {
            // Upsert: update jika sudah ada, insert jika baru
            InstagramPost::updateOrCreate(
                ['instagram_id' => $post['id']],
                [
                    'media_type'    => $post['media_type'] ?? 'IMAGE',
                    'media_url'     => $post['media_url'] ?? null,
                    'thumbnail_url' => $post['thumbnail_url'] ?? null,
                    'permalink'     => $post['permalink'] ?? '#',
                    'caption'       => $post['caption'] ?? null,
                    'posted_at'     => isset($post['timestamp'])
                        ? \Carbon\Carbon::parse($post['timestamp'])
                        : now(),
                ]
            );
            $synced++;
        }

        $this->info("   ✓ {$synced} postingan disinkronisasi.");
    }

    /**
     * Sinkronisasi foto profil untuk semua vendor yang memiliki instagram_username.
     */
    protected function syncVendorProfilePics(): void
    {
        $this->info('👤 Mengambil foto profil vendor...');

        $vendors = Vendor::where(function($q) {
            $q->whereNotNull('instagram_username')->where('instagram_username', '!=', '')
              ->orWhereNotNull('instagram_url');
        })->get();

        if ($vendors->isEmpty()) {
            $this->warn('   ⚠️  Tidak ada vendor dengan instagram_username / instagram_url.');
            return;
        }

        $synced = 0;
        foreach ($vendors as $vendor) {
            if (empty($vendor->instagram_username)) {
                $username = InstagramService::extractUsernameFromUrl($vendor->instagram_url);
                if ($username) {
                    $vendor->update(['instagram_username' => $username]);
                }
            }

            if (!empty($vendor->instagram_username)) {
                $picUrl = $this->instagram->fetchVendorProfilePicture($vendor->instagram_username);

                if ($picUrl) {
                    $vendor->update([
                        'instagram_profile_pic' => $picUrl,
                    ]);
                    $this->line("   ✓ @{$vendor->instagram_username} — foto profil diperbarui.");
                    $synced++;
                } else {
                    $this->warn("   ⚠️  @{$vendor->instagram_username} — gagal mendapatkan foto profil.");
                }

                // Jeda kecil agar tidak kena rate limit
                usleep(500_000); // 0.5 detik
            }
        }

        $this->info("   ✓ {$synced}/{$vendors->count()} vendor foto profil disinkronisasi.");
    }

    /**
     * Refresh Long-Lived Token dan tampilkan token baru.
     */
    protected function refreshToken(): void
    {
        $this->info('🔄 Memperpanjang token Instagram...');

        $newToken = $this->instagram->refreshLongLivedToken();

        if ($newToken) {
            $this->info('   ✓ Token baru:');
            $this->line("   <comment>{$newToken}</comment>");
            $this->warn('   ⚠️  Harap update INSTAGRAM_ACCESS_TOKEN di .env dengan token baru di atas!');
        } else {
            $this->error('   ✗ Gagal refresh token. Periksa INSTAGRAM_ACCESS_TOKEN di .env');
        }
    }
}
