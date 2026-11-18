<?php

namespace App\Filament\Resources\DeliveryOrderWorkshops\Pages;

use App\Filament\Resources\DeliveryOrderWorkshops\DeliveryOrderWorkshopResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDeliveryOrderWorkshops extends ListRecords
{
    protected static string $resource = DeliveryOrderWorkshopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
