<?php

namespace Database\Factories;

use App\Models\ToDoList;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ToDoList>
 */
class ToDoListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'todoname' => $this->faker->unique()->sentence(),
        ];
    }
}
