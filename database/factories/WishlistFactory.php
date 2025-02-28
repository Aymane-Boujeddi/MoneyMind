<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wishlist>
 */
class WishlistFactory extends Factory
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
            'wishlist_name' => $this->faker->name,
            'wishlist_amount' => $this->faker->randomFloat(2, 2000, 10000),
            'wishlist_progress' => $this->faker->randomFloat(2,1,100),
            'user_id' => User::all()->random()->id,
        ];
    }
}
