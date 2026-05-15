<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Department;
use App\Models\Course;
use App\Models\Teacher;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
 public function definition(): array
{
    return [
        'name' => fake()->name(),
        'email' => fake()->unique()->safeEmail(),
        'phone' => fake()->phoneNumber(),
     
        'department_id' => Department::inRandomOrder()->first()->id ?? null,
        'course_id' => Course::inRandomOrder()->first()->id ?? null,
        'teacher_id' =>Teacher::inRandomOrder()->first()->id ?? null,
    ];
}
}