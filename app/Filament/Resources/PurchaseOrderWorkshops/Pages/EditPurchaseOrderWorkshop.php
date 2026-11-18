<?php

namespace App\Filament\Resources\PurchaseOrderWorkshops\Pages;

use App\Filament\Resources\PurchaseOrderWorkshops\PurchaseOrderWorkshopResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPurchaseOrderWorkshop extends EditRecord
{
    protected static string $resource = PurchaseOrderWorkshopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
