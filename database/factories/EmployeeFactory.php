<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'salary' => rand(500, 1000),
            'is_active' => rand(0, 1),
            'hire_date' => fake()->dateTimeBetween('2010-01-01', '2020-01-01'),
            'age' =>  rand(20, 40)
        ];
    }
}
