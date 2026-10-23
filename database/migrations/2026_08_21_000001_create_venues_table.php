<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel venue untuk Paket Pernikahan Batch 4 (Luxury) dan kebutuhan lain.
     * Tidak semua paket memiliki venue, sehingga relasi bersifat nullable.
     */
    public function up(): void
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address')->nullable();
            $table->unsignedInteger('capacity')->nullable()->comment('Kapasitas tamu (pax)');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('price_info')->nullable()->comment('Info harga, mis: Sudah termasuk dalam paket / Rp5.000.000');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('venues');
    }
};
