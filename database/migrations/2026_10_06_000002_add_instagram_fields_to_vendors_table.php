<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambahkan kolom Instagram ke tabel vendors.
     *
     * - instagram_username : username IG tanpa '@' (untuk API lookup)
     * - instagram_user_id  : numeric User ID dari Instagram API
     * - instagram_pic_url  : URL foto profil yang diambil dari IG (cached)
     * - ig_pic_synced_at   : Waktu terakhir foto profil disinkronisasi
     */
    public function up(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->string('instagram_username')->nullable()->after('instagram_url');
            $table->string('instagram_user_id')->nullable()->after('instagram_username');
            $table->string('instagram_pic_url', 500)->nullable()->after('instagram_user_id');
            $table->timestamp('ig_pic_synced_at')->nullable()->after('instagram_pic_url');
        });
    }

    /**
     * Balik migrasi.
     */
    public function down(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->dropColumn([
                'instagram_username',
                'instagram_user_id',
                'instagram_pic_url',
                'ig_pic_synced_at',
            ]);
        });
    }
};
