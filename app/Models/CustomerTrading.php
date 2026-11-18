<?php

namespace App\Models;

use Database\Factories\CustomerTradingFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['uniqueID', 'name', 'company', 'email', 'phone', 'logo', 'notes', 'status'])]
class CustomerTrading extends Model
{
    /** @use HasFactory<CustomerTradingFactory> */
    use HasFactory;

    public function quotations(): HasMany
    {
        return $this->hasMany(QuotationTrading::class);
    }
}
