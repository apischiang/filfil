<?php

namespace Database\Factories;

use App\Models\CustomerTrading;
use App\Models\QuotationTrading;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<QuotationTrading>
 */
class QuotationTradingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quotation_number' => fake()->unique()->numerify('########'),
            'customer_trading_id' => CustomerTrading::factory(),
            'customer_name' => fake()->name(),
            'customer_company' => fake()->company(),
            'customer_email' => fake()->safeEmail(),
            'customer_phone' => fake()->phoneNumber(),
            'quotation_date' => today(),
            'valid_until' => today()->addDays(30),
            'status' => 'draft',
            'currency' => 'IDR',
            'subtotal' => 0,
            'discount_total' => 0,
            'tax_total' => 0,
            'grand_total' => 0,
        ];
    }
}
