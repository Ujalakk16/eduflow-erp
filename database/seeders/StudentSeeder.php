<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Course;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        if (Course::count() == 0) {
            Course::factory()->count(5)->create();
        }

        // Ab 30 students create karein
        Student::factory()->count(30)->create();
    }
}