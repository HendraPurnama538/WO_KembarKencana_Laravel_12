<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->tinyInteger('batch')->default(1)->after('id');          
            $table->unsignedInteger('pax')->nullable()->after('price');    
            $table->enum('status', ['active', 'inactive'])
                  ->default('active')->after('facilities');                  
        });
    }

    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn(['batch', 'pax', 'status']);
        });
    }
};
