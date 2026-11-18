<?php

namespace App\Filament\Resources\QuotationTradings\Pages;

use App\Filament\Resources\QuotationTradings\QuotationTradingResource;
use App\Models\CustomerTrading;
use Filament\Resources\Pages\CreateRecord;

class CreateQuotationTrading extends CreateRecord
{
    protected static string $resource = QuotationTradingResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $customer = CustomerTrading::query()->findOrFail($data['customer_trading_id']);

        return [
            ...$data,
            'customer_name' => $customer->name,
            'customer_company' => $customer->company,
            'customer_email' => $customer->email,
            'customer_phone' => $customer->phone,
            'created_by' => auth()->id(),
        ];
    }
}
