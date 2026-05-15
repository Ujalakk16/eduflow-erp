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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            
            // 1. 'course_name' (string) ko 'course_id' (foreign key) se badal diya
            // Yeh line 'courses' table ki 'id' se link karegi
            $table->foreignId('course_id')
                  ->nullable() 
                  ->constrained()
                  ->onDelete('cascade'); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};