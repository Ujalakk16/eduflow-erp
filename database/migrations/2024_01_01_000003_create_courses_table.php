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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            // 'unique' constraint zaroori hai taake aik hi naam ke do courses na hon
            $table->string('name')->unique(); 
            
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Pehle Foreign Key constraints ka khayal rakhna parta hai agar tables linked hon
        Schema::dropIfExists('courses');
    }
};