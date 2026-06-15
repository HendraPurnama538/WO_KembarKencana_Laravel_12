<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('decoration_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');                                          
            $table->string('category');                                      
            $table->string('location_type')->nullable();                     
            $table->decimal('price', 15, 2);                                 
            $table->text('description')->nullable();                         
            $table->text('facilities')->nullable();                         
            $table->string('image')->nullable();                                 
            $table->enum('status', ['active', 'inactive'])->default('active'); 
            $table->timestamps();
        });
    }

       
    public function down(): void
    {
        Schema::dropIfExists('decoration_packages');
    }
};
