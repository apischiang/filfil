<?php

namespace Database\Seeders;

use App\Models\CustomerTrading;
use App\Models\QuotationTrading;
use Illuminate\Database\Seeder;

class QuotationTradingItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customer = CustomerTrading::query()->first();

        if (! $customer) {
            return;
        }

        $quotation = QuotationTrading::factory()->create([
            'customer_trading_id' => $customer->id,
            'customer_name' => $customer->name,
            'customer_company' => $customer->company,
            'customer_email' => $customer->email,
            'customer_phone' => $customer->phone,
        ]);

        $quotation->items()->createMany([
            [
                'item_name' => 'Contoh produk',
                'description' => 'Item contoh untuk quotation',
                'quantity' => 1,
                'unit' => 'pcs',
                'unit_price' => 100000,
                'tax_rate' => 11,
            ],
        ]);
    }
}
