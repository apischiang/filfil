<?php

namespace App\Filament\Resources\DeliveryOrderTradings\Pages;

use App\Filament\Resources\DeliveryOrderTradings\DeliveryOrderTradingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDeliveryOrderTrading extends EditRecord
{
    protected static string $resource = DeliveryOrderTradingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
