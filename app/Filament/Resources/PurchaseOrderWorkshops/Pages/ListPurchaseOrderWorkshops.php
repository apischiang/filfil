<?php

namespace App\Filament\Resources\PurchaseOrderWorkshops\Pages;

use App\Filament\Resources\PurchaseOrderWorkshops\PurchaseOrderWorkshopResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPurchaseOrderWorkshops extends ListRecords
{
    protected static string $resource = PurchaseOrderWorkshopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
