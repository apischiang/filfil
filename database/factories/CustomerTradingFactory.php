<?php

namespace Database\Factories;

use App\Models\CustomerTrading;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CustomerTrading>
 */
class CustomerTradingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uniqueID' => fake()->unique()->numerify('##########'),
            'name' => fake()->name(),
            'company' => fake()->company(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'status' => fake()->randomElement(['pt', 'cv']),
        ];
    }
}
