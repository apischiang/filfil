<?php

namespace App\Filament\Resources\DeliveryOrderTradings;

use App\Filament\Resources\DeliveryOrderTradings\Pages\CreateDeliveryOrderTrading;
use App\Filament\Resources\DeliveryOrderTradings\Pages\EditDeliveryOrderTrading;
use App\Filament\Resources\DeliveryOrderTradings\Pages\ListDeliveryOrderTradings;
use App\Filament\Resources\DeliveryOrderTradings\Schemas\DeliveryOrderTradingForm;
use App\Filament\Resources\DeliveryOrderTradings\Tables\DeliveryOrderTradingsTable;
use App\Models\DeliveryOrderTrading;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class DeliveryOrderTradingResource extends Resource
{
    protected static ?string $model = DeliveryOrderTrading::class;

    protected static ?string $modelLabel = 'Delivery Order';

    protected static string|UnitEnum|null $navigationGroup = 'Trading';

    protected static ?int $navigationSort = 2;

    protected static ?string $slug = 'trading/delivery-order';

    protected static ?string $navigationLabel = 'Delivery Order';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return DeliveryOrderTradingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DeliveryOrderTradingsTable::configure($table);
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
            'index' => ListDeliveryOrderTradings::route('/'),
            'create' => CreateDeliveryOrderTrading::route('/create'),
            'edit' => EditDeliveryOrderTrading::route('/{record}/edit'),
        ];
    }
}
