<?php

namespace App\Filament\Resources\CustomerTradings\Pages;

use App\Filament\Resources\CustomerTradings\CustomerTradingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCustomerTrading extends EditRecord
{
    protected static string $resource = CustomerTradingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
