<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambahkan kolom venue_id (nullable) ke tabel packages.
     * Jika null = paket tidak include venue.
     * Jika ada = venue sudah termasuk dalam paket (biasanya Batch 4 Luxury).
     */
    public function up(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->foreignId('venue_id')
                  ->nullable()
                  ->after('status')
                  ->constrained('venues')
                  ->nullOnDelete()
                  ->comment('Jika null = venue tidak termasuk. Batch 4 (Luxury) biasanya memiliki venue.');
        });
    }

    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Venue::class);
            $table->dropColumn('venue_id');
        });
    }
};
