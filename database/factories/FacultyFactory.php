<?php

namespace Database\Factories;

use App\Models\Faculty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Faculty>
 */
class FacultyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
{
    return [
        // Fake data generate karne ke liye
      // app/Factories/FacultyFactory.php
'name' => 'Faculty of ' . fake()->unique()->jobTitle(), // Ya koi specific list
        'code' => strtoupper(fake()->unique()->lexify('F???')),
    ];
}
}
