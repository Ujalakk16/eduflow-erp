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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('image')->nullable();
            
            // 1. Department ID 
        $table->foreignId('department_id')
              ->nullable()
              ->constrained()
              ->onDelete('set null');
            // 1. Course se link karne ke liye 'course_id'
            $table->foreignId('course_id')
                  ->nullable()
                  ->constrained()
                  ->onDelete('set null'); // Course delete ho toh student delete na ho

            // 2. Teacher se link karne ke liye 'teacher_id'
            $table->foreignId('teacher_id')
                  ->nullable()
                  ->constrained()
                  ->onDelete('set null');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};