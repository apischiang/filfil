<?php

namespace App\Filament\Resources\QuotationWorkshops\Pages;

use App\Filament\Resources\QuotationWorkshops\QuotationWorkshopResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListQuotationWorkshops extends ListRecords
{
    protected static string $resource = QuotationWorkshopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
