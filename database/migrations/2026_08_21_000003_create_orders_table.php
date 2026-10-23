<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel orders — menyimpan pesanan dari pengunjung.
     * Pengunjung tidak harus punya akun; nama, HP, dan alamat disimpan langsung.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // ── Data Pengunjung ──────────────────────────────────────────
            $table->string('visitor_name')->comment('Nama lengkap pengunjung/pemesan');
            $table->string('visitor_phone', 20)->comment('Nomor HP/WhatsApp');
            $table->text('visitor_address')->nullable()->comment('Alamat pelaksanaan/pengiriman');

            // ── Data Acara ───────────────────────────────────────────────
            $table->date('execution_date')->comment('Tanggal pelaksanaan acara');

            // ── Paket & Venue ────────────────────────────────────────────
            $table->foreignId('package_id')
                  ->nullable()
                  ->constrained('packages')
                  ->nullOnDelete()
                  ->comment('Paket Pernikahan yang dipilih');

            $table->foreignId('decoration_package_id')
                  ->nullable()
                  ->constrained('decoration_packages')
                  ->nullOnDelete()
                  ->comment('Paket Dekorasi tambahan jika ada');

            $table->foreignId('venue_id')
                  ->nullable()
                  ->constrained('venues')
                  ->nullOnDelete()
                  ->comment('Venue jika tidak termasuk paket');

            // ── Finansial ────────────────────────────────────────────────
            $table->decimal('total_estimate', 15, 2)->default(0)->comment('Total estimasi harga');

            // ── Status ───────────────────────────────────────────────────
            $table->enum('status', [
                'menunggu',
                'dikonfirmasi',
                'diproses',
                'selesai',
                'dibatalkan',
            ])->default('menunggu');

            $table->text('notes')->nullable()->comment('Catatan tambahan dari pengunjung');
            $table->timestamp('ordered_at')->useCurrent()->comment('Waktu order dibuat');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
