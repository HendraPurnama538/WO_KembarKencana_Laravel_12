<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('handle');                // e.g. @kembarkencanaplanner
            $table->string('category');              // Wedding Planning, MUA, Dekorasi, etc.
            $table->string('icon')->default('bi-check-circle-fill');
            $table->string('image')->nullable();     // path to uploaded image
            $table->text('description')->nullable();
            $table->string('instagram_url');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
