<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
   public function run(): void
{
    // Saari faculties get karein
    $faculties = Faculty::all();

    // Har faculty ke liye 2 se 4 random departments banayein
    foreach ($faculties as $faculty) {
        Department::factory(rand(5, 8))->create([
            'faculty_id' => $faculty->id,
        ]);
    }
}
}