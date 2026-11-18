<?php

namespace App\Filament\Resources\PurchaseOrderTradings\Pages;

use App\Filament\Resources\PurchaseOrderTradings\PurchaseOrderTradingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPurchaseOrderTrading extends EditRecord
{
    protected static string $resource = PurchaseOrderTradingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
