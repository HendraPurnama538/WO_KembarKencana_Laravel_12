<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Pivot table: order ↔ vendor.
     * Menyimpan vendor yang digunakan dalam sebuah order,
     * sehingga admin mengetahui vendor apa saja yang terlibat.
     */
    public function up(): void
    {
        Schema::create('order_vendors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->foreignId('vendor_id')->constrained('vendors')->cascadeOnDelete();
            $table->string('role')->nullable()->comment('Peran vendor dalam order, mis: MUA, Dokumentasi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_vendors');
    }
};
