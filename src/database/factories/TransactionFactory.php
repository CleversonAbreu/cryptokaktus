<?php

namespace Database\Factories;

use App\Models\Crypto;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['sale','purchase']),
            'value' =>  fake()->randomDigit(),
            'date' => fake()->dateTimeBetween('-4 year'),
            'users_id' =>  User::factory()->create()->id,
            'cryptos_id' => Crypto::factory()->create()->id,
        ];
    }
}
