<?php

namespace Database\Factories;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
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
            'gender' => fake()->numberBetween('1', '3'),
            'phoneNumber' => fake()->phoneNumber(),
            'school' => fake()->sentence(),
            'class_id' => Classroom::all()->random()->id,
        ];
    }
}
