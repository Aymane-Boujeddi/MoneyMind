<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // Default password
            'salary' => $this->faker->randomFloat(2, 2000, 10000), // Optional salary, between 2000 and 10000
            'budget' => $this->faker->randomFloat(2, 2000, 10000), // Optional salary, between 2000 and 10000
            'role' => $this->faker->randomElement(['admin', 'client']),
            'credit_date' => $this->faker->numberBetween(1, 31), // Random credit date between 1 and 28
            'last_logged' => $this->faker->dateTimeThisYear(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
