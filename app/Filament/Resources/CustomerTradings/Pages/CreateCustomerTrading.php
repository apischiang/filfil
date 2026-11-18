<?php

namespace App\Filament\Resources\CustomerTradings\Pages;

use App\Filament\Resources\CustomerTradings\CustomerTradingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomerTrading extends CreateRecord
{
    protected static string $resource = CustomerTradingResource::class;
}
