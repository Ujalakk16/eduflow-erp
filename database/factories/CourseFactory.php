<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Course>
 */
class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Realistic course names ke liye randomElement use karna behtar hai
        $courses = [
            'Web Development', 
            'Graphic Designing', 
            'Cyber Security', 
            'Laravel Pro', 
            'Data Science', 
            'Artificial Intelligence',
            'Mobile App Development',
            'Digital Marketing'
        ];

        return [
            'name' => $this->faker->unique()->randomElement($courses),
        ];
    }
}