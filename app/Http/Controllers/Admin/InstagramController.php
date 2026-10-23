<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstagramPost;
use App\Services\InstagramService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InstagramController extends Controller
{
    public function __construct(protected InstagramService $instagram) {}

    /**
     * Daftar postingan Instagram (manajemen + toggle visibilitas).
     */
    public function index(): View
    {
        $posts = InstagramPost::orderByDesc('timestamp')->paginate(12);

        return view('admin.instagram.index', compact('posts'));
    }

    /**
     * Jalankan sinkronisasi postingan dari API Instagram.
     */
    public function sync(): RedirectResponse
    {
        $limit = (int) config('instagram.fetch_limit', 12);
        $posts = $this->instagram->fetchRecentPosts($limit);

        if (empty($posts)) {
            return back()->with('error', 'Gagal mengambil data dari Instagram. Pastikan INSTAGRAM_ACCESS_TOKEN di .env sudah diisi dan valid.');
        }

        $synced = 0;
        foreach ($posts as $post) {
            InstagramPost::updateOrCreate(
                ['instagram_id' => $post['id']],
                [
                    'media_type'    => $post['media_type'] ?? 'IMAGE',
                    'media_url'     => $post['media_url'] ?? null,
                    'thumbnail_url' => $post['thumbnail_url'] ?? null,
                    'permalink'     => $post['permalink'] ?? '#',
                    'caption'       => $post['caption'] ?? null,
                    'timestamp'     => isset($post['timestamp'])
                        ? \Carbon\Carbon::parse($post['timestamp'])
                        : now(),
                ]
            );
            $synced++;
        }

        return back()->with('success', "{$synced} postingan berhasil disinkronisasi dari Instagram.");
    }

    /**
     * Toggle visibilitas postingan (tampil / sembunyikan di website).
     */
    public function toggleVisible(InstagramPost $post): RedirectResponse
    {
        $post->update(['is_visible' => !$post->is_visible]);

        $label = $post->is_visible ? 'ditampilkan' : 'disembunyikan';
        return back()->with('success', "Postingan berhasil {$label}.");
    }

    /**
     * Hapus postingan dari cache lokal (tidak menghapus dari Instagram).
     */
    public function destroy(InstagramPost $post): RedirectResponse
    {
        $post->delete();
        return back()->with('success', 'Postingan dihapus dari cache lokal.');
    }
}
