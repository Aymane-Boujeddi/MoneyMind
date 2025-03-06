<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Saving>
 */
class SavingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'title' => $this->faker->word,
            'amount' => $this->faker->randomFloat(2, 0, 10000),
            'progress' => $this->faker->randomFloat(2, 0, 100),
            'user_id' => $this->faker->randomDigitNot(0),
        ];
    }
}
