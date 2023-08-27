<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lesson1' => fake()->date(),
            'lesson2' => fake()->date(),
            'lesson3' => fake()->date(),
            'lesson4' => fake()->date(),
            'lesson5' => fake()->date(),
            'lesson6' => fake()->date(),
            'lesson7' => fake()->date(),
            'lesson8' => fake()->date(),
            'lesson9' => fake()->date(),
            'lesson10' => fake()->date(),
            'tuitionFee' => '400k CK',
            'student_id' => Student::all()->random()->id,
        ];
    }
}
