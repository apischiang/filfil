<?php

namespace App\Filament\Resources\CustomerTradings;

use App\Filament\Resources\CustomerTradings\Pages\CreateCustomerTrading;
use App\Filament\Resources\CustomerTradings\Pages\EditCustomerTrading;
use App\Filament\Resources\CustomerTradings\Pages\ListCustomerTradings;
use App\Filament\Resources\CustomerTradings\Schemas\CustomerTradingForm;
use App\Filament\Resources\CustomerTradings\Tables\CustomerTradingsTable;
use App\Models\CustomerTrading;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CustomerTradingResource extends Resource
{
    protected static ?string $model = CustomerTrading::class;

    protected static ?string $modelLabel = 'Customer';

    protected static string|UnitEnum|null $navigationGroup = 'Trading';

    protected static ?int $navigationSort = 4;

    protected static ?string $slug = 'trading/customer';

    protected static ?string $navigationLabel = 'Customer';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CustomerTradingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CustomerTradingsTable::configure($table);
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
            'index' => ListCustomerTradings::route('/'),
            'create' => CreateCustomerTrading::route('/create'),
            'edit' => EditCustomerTrading::route('/{record}/edit'),
        ];
    }
}
