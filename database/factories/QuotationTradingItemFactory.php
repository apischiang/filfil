<?php

namespace Database\Factories;

use App\Models\QuotationTrading;
use App\Models\QuotationTradingItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<QuotationTradingItem>
 */
class QuotationTradingItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quotation_trading_id' => QuotationTrading::factory(),
            'item_name' => fake()->words(3, true),
            'description' => fake()->sentence(),
            'quantity' => fake()->randomFloat(3, 1, 20),
            'unit' => 'pcs',
            'unit_price' => fake()->randomFloat(2, 1000, 1000000),
            'discount_amount' => 0,
            'tax_rate' => 11,
            'sort_order' => 0,
        ];
    }
}
