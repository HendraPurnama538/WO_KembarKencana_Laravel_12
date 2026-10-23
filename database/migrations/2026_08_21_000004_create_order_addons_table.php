<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Pivot table: order ↔ addon.
     * Menyimpan add-on yang dipilih dalam sebuah order,
     * beserta qty dan harga snapshot (harga saat order dibuat).
     */
    public function up(): void
    {
        Schema::create('order_addons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->foreignId('addon_id')->constrained('addons')->cascadeOnDelete();
            $table->unsignedInteger('qty')->default(1)->comment('Jumlah/kuantitas add-on');
            $table->decimal('price_snapshot', 15, 2)->default(0)->comment('Harga add-on saat order dibuat');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_addons');
    }
};
