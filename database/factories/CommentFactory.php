<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'game_id' => $this->faker->numberBetween(21, 30),
            'user_id' => $this->faker->numberBetween(1, 10),
            'text' => $this->faker->text($maxNbChars = 100)
        ];
    }
}
