<?php

namespace App\Models;

use Database\Factories\QuotationTradingItemFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'quotation_trading_id',
    'item_name',
    'description',
    'quantity',
    'unit',
    'unit_price',
    'discount_amount',
    'tax_rate',
    'line_subtotal',
    'tax_amount',
    'line_total',
    'sort_order',
])]
class QuotationTradingItem extends Model
{
    /** @use HasFactory<QuotationTradingItemFactory> */
    use HasFactory;

    protected static function booted(): void
    {
        static::saving(function (QuotationTradingItem $item): void {
            $lineSubtotal = round((float) $item->quantity * (float) $item->unit_price, 2);
            $discountAmount = min(max((float) $item->discount_amount, 0), $lineSubtotal);
            $taxableAmount = $lineSubtotal - $discountAmount;
            $taxAmount = round($taxableAmount * (float) $item->tax_rate / 100, 2);

            $item->line_subtotal = $lineSubtotal;
            $item->discount_amount = $discountAmount;
            $item->tax_amount = $taxAmount;
            $item->line_total = $taxableAmount + $taxAmount;
        });

        static::saved(function (QuotationTradingItem $item): void {
            $item->quotationTrading->recalculateTotals();
        });

        static::deleted(function (QuotationTradingItem $item): void {
            $item->quotationTrading->recalculateTotals();
        });
    }

    protected function casts(): array
    {
        return [
            'quantity' => 'decimal:3',
            'unit_price' => 'decimal:2',
            'discount_amount' => 'decimal:2',
            'tax_rate' => 'decimal:2',
            'line_subtotal' => 'decimal:2',
            'tax_amount' => 'decimal:2',
            'line_total' => 'decimal:2',
            'sort_order' => 'integer',
        ];
    }

    public function quotationTrading(): BelongsTo
    {
        return $this->belongsTo(QuotationTrading::class);
    }
}
