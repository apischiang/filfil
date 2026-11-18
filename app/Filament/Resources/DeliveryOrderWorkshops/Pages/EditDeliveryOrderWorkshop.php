<?php

namespace App\Filament\Resources\DeliveryOrderWorkshops\Pages;

use App\Filament\Resources\DeliveryOrderWorkshops\DeliveryOrderWorkshopResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDeliveryOrderWorkshop extends EditRecord
{
    protected static string $resource = DeliveryOrderWorkshopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
