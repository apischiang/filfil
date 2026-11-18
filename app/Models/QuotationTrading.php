<?php

namespace App\Models;

use Database\Factories\QuotationTradingFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'quotation_number',
    'customer_trading_id',
    'customer_name',
    'customer_company',
    'customer_email',
    'customer_phone',
    'quotation_date',
    'valid_until',
    'status',
    'currency',
    'subtotal',
    'discount_total',
    'tax_total',
    'grand_total',
    'payment_terms',
    'delivery_terms',
    'notes',
    'created_by',
])]
class QuotationTrading extends Model
{
    /** @use HasFactory<QuotationTradingFactory> */
    use HasFactory;

    protected $attributes = [
        'status' => 'draft',
        'currency' => 'IDR',
    ];

    protected function casts(): array
    {
        return [
            'quotation_date' => 'date',
            'valid_until' => 'date',
            'subtotal' => 'decimal:2',
            'discount_total' => 'decimal:2',
            'tax_total' => 'decimal:2',
            'grand_total' => 'decimal:2',
        ];
    }

    public function customerTrading(): BelongsTo
    {
        return $this->belongsTo(CustomerTrading::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(QuotationTradingItem::class)->orderBy('sort_order');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function recalculateTotals(): void
    {
        $totals = $this->items()->selectRaw(
            'COALESCE(SUM(line_subtotal), 0) as subtotal, COALESCE(SUM(discount_amount), 0) as discount_total, COALESCE(SUM(tax_amount), 0) as tax_total, COALESCE(SUM(line_total), 0) as grand_total'
        )->first();

        $this->forceFill([
            'subtotal' => $totals->subtotal,
            'discount_total' => $totals->discount_total,
            'tax_total' => $totals->tax_total,
            'grand_total' => $totals->grand_total,
        ])->saveQuietly();
    }
}
