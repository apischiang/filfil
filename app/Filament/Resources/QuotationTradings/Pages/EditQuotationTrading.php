<?php

namespace App\Filament\Resources\QuotationTradings\Pages;

use App\Filament\Resources\QuotationTradings\QuotationTradingResource;
use App\Models\CustomerTrading;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditQuotationTrading extends EditRecord
{
    protected static string $resource = QuotationTradingResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ((string) $data['customer_trading_id'] === (string) $this->getRecord()->customer_trading_id) {
            return $data;
        }

        $customer = CustomerTrading::query()->findOrFail($data['customer_trading_id']);

        return [
            ...$data,
            'customer_name' => $customer->name,
            'customer_company' => $customer->company,
            'customer_email' => $customer->email,
            'customer_phone' => $customer->phone,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
