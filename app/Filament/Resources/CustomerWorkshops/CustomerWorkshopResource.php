<?php

namespace App\Filament\Resources\CustomerWorkshops;

use App\Filament\Resources\CustomerWorkshops\Pages\CreateCustomerWorkshop;
use App\Filament\Resources\CustomerWorkshops\Pages\EditCustomerWorkshop;
use App\Filament\Resources\CustomerWorkshops\Pages\ListCustomerWorkshops;
use App\Filament\Resources\CustomerWorkshops\Schemas\CustomerWorkshopForm;
use App\Filament\Resources\CustomerWorkshops\Tables\CustomerWorkshopsTable;
use App\Models\CustomerWorkshop;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CustomerWorkshopResource extends Resource
{
    protected static ?string $model = CustomerWorkshop::class;

    protected static string|UnitEnum|null $navigationGroup = 'Workshop';

    protected static ?string $modelLabel = 'Customer';

    protected static ?int $navigationSort = 4;

    protected static ?string $slug = 'workshop/customers';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CustomerWorkshopForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CustomerWorkshopsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCustomerWorkshops::route('/'),
            'create' => CreateCustomerWorkshop::route('/create'),
            'edit' => EditCustomerWorkshop::route('/{record}/edit'),
        ];
    }
}
