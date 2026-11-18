<?php

namespace App\Filament\Resources\QuotationTradings\Pages;

use App\Filament\Resources\QuotationTradings\QuotationTradingResource;
use App\Models\CustomerTrading;
use App\Models\QuotationTrading;
use Filament\Actions\Action;
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
            Action::make('print')
                ->label('Cetak quotation')
                ->icon('heroicon-o-printer')
                ->url(fn (QuotationTrading $record): string => route('trading.quotation.print', $record))
                ->openUrlInNewTab(),
            DeleteAction::make(),
        ];
    }
}
