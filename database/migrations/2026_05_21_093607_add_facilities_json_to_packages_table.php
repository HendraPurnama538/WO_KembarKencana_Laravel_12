<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Menambah kolom facilities_json (nullable) setelah kolom facilities.
     * Data lama di kolom facilities tetap aman.
     */
    public function up(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->json('facilities_json')->nullable()->after('facilities')
                  ->comment('Fasilitas terstruktur per kategori, format JSON array [{category, items[]}]');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn('facilities_json');
        });
    }
};
