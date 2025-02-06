<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Crypto>
 */
class CryptoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Bitcoin','Ethereum','Tether',	'USD Coin','BNB','XRP','Binance USD','Dogecoin','Cardano','Polygon','Dai','Litecoin',	'Polkadot','TRON','Shiba Inu','Solan','Uniswap','Avalanche','UNUS SED LEO','Wrapped Bitcoin']),
            'price' =>  fake()->randomDigit(),
            'income' => fake()->numberBetween(0, 100),
            'creation_year' => fake()->date('Y'),
            'location' => fake()->country(),
            'category' =>  fake()->randomElement(['payment', 'infrastructure','financial','services','entertainment'])
        ];
    }
}
