<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Depense>
 */
class DepenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => $this->faker->randomFloat(2, 10, 1000), 
            'date_depense' => $this->faker->date(),
            'start_date' => $this->faker->date(),
            'title' => $this->faker->sentence, 
            'type' => $this->faker->randomElement(['ponctuel', 'recurrent']),
            'category_id' => Category::all()->random()->id,  
            'user_id' => User::all()->random()->id, 
        ];
    }
}
