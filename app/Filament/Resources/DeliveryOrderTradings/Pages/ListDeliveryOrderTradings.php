<?php

namespace App\Filament\Resources\DeliveryOrderTradings\Pages;

use App\Filament\Resources\DeliveryOrderTradings\DeliveryOrderTradingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDeliveryOrderTradings extends ListRecords
{
    protected static string $resource = DeliveryOrderTradingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
