<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //untuk mengisi data palsu pada setiap kolom di tabel todos
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'category' => $this->faker->randomElement(['Work', 'Personal', '
Shopping', 'Others']),
            'status' => $this->faker->randomElement([1, 0]),
            'due_date' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}
