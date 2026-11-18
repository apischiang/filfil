<?php

namespace App\Filament\Resources\QuotationWorkshops\Pages;

use App\Filament\Resources\QuotationWorkshops\QuotationWorkshopResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditQuotationWorkshop extends EditRecord
{
    protected static string $resource = QuotationWorkshopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
