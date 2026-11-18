<?php

namespace App\Filament\Resources\PurchaseOrderTradings\Pages;

use App\Filament\Resources\PurchaseOrderTradings\PurchaseOrderTradingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPurchaseOrderTradings extends ListRecords
{
    protected static string $resource = PurchaseOrderTradingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
