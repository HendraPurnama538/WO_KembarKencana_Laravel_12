<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Pastikan kolom instagram_profile_pic ada di tabel vendors.
     */
    public function up(): void
    {
        if (Schema::hasTable('vendors') && !Schema::hasColumn('vendors', 'instagram_profile_pic')) {
            Schema::table('vendors', function (Blueprint $table) {
                $table->string('instagram_profile_pic', 500)->nullable()->after('instagram_pic_url');
            });
        }
    }

    /**
     * Balik migrasi.
     */
    public function down(): void
    {
        if (Schema::hasTable('vendors') && Schema::hasColumn('vendors', 'instagram_profile_pic')) {
            Schema::table('vendors', function (Blueprint $table) {
                $table->dropColumn('instagram_profile_pic');
            });
        }
    }
};
