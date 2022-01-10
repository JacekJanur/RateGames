<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'category' => $this->faker->randomElement(['Indie', 'FPS', 'Action', 'Horror']),
            'text' => $this->faker->text($maxNbChars = 100)
        ];
    }
}
