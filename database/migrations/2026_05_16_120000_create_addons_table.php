<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('addons', function (Blueprint $table) {
            $table->id();
            $table->string('name');                                              
            $table->string('category');                                          
            $table->decimal('price', 15, 2);                                     
            $table->string('unit');                                              
            $table->text('description')->nullable();                             
            $table->enum('status', ['active', 'inactive'])->default('active');   
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('addons');
    }
};
