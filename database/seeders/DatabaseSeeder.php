<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Faculty;
use App\Models\Fee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Pehle Faculties banayein
        // Humne isse 3 kar diya hai taake dashboard card par space sahi lage
        Faculty::factory(4)->create();

        // 2. Ab Departments banayein 
        // ZAROORI: Pehle check karein ke DepartmentSeeder mein humne random distribution dali hai
        $this->call(DepartmentSeeder::class);

        // 3. Courses aur Teachers banayein
        $courses = Course::factory(8)->create();
        $teachers = Teacher::factory(15)->create();

        // 4. Students banayein aur unki Fees generate karein
        Student::factory(50)->create()->each(function ($student) {
            Fee::create([
                'student_id' => $student->id,
                'amount'     => rand(5000, 15000),
                'status'     => 'paid',
                'month'      => now()->format('F'), 
                'year'       => now()->format('Y'),  
            ]);
        });
    }
}