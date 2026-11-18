<?php

namespace App\Filament\Resources\CustomerWorkshops\Pages;

use App\Filament\Resources\CustomerWorkshops\CustomerWorkshopResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCustomerWorkshop extends EditRecord
{
    protected static string $resource = CustomerWorkshopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
