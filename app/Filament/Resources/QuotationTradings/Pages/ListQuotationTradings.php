<?php

namespace App\Filament\Resources\QuotationTradings\Pages;

use App\Filament\Resources\QuotationTradings\QuotationTradingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListQuotationTradings extends ListRecords
{
    protected static string $resource = QuotationTradingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
