<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Classroom;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
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
            'phoneNumber' =>fake()->phoneNumber(),
            'email' => fake()->email(),
            'numberOfShifts' => fake()->numberBetween('0', '20'),
            'class_id' => Classroom::all()->random()->id,
        ];
    }
}
