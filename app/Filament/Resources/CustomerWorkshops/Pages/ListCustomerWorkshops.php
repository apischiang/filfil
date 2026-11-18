<?php

namespace App\Filament\Resources\CustomerWorkshops\Pages;

use App\Filament\Resources\CustomerWorkshops\CustomerWorkshopResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCustomerWorkshops extends ListRecords
{
    protected static string $resource = CustomerWorkshopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
