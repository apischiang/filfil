<?php

namespace App\Filament\Resources\CustomerTradings\Pages;

use App\Filament\Resources\CustomerTradings\CustomerTradingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCustomerTradings extends ListRecords
{
    protected static string $resource = CustomerTradingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
