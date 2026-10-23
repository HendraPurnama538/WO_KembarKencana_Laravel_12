<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Buat tabel cache postingan Instagram.
     */
    public function up(): void
    {
        Schema::create('instagram_posts', function (Blueprint $table) {
            $table->id();
            $table->string('instagram_id')->unique();          // ID unik dari Instagram API
            $table->string('media_type');                      // IMAGE, VIDEO, CAROUSEL_ALBUM
            $table->string('media_url')->nullable();           // URL gambar/video
            $table->string('thumbnail_url')->nullable();       // Thumbnail untuk VIDEO
            $table->string('permalink');                       // URL postingan Instagram
            $table->text('caption')->nullable();               // Teks caption
            $table->timestamp('timestamp');                    // Waktu publish di Instagram
            $table->boolean('is_visible')->default(true);     // Kontrol tampil di website
            $table->integer('sort_order')->default(0);        // Urutan tampil (override)
            $table->timestamps();
        });
    }

    /**
     * Balik migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('instagram_posts');
    }
};
