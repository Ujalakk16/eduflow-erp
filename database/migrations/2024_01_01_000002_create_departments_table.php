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
    Schema::create('departments', function (Blueprint $table) {
        $table->id();
        // Yeh line Faculty aur Department ko aapas mein jorti hai
        $table->foreignId('faculty_id')->constrained()->onDelete('cascade');
        
        $table->string('name'); // e.g., Information Technology
        $table->string('code')->unique(); // e.g., IT-01
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
