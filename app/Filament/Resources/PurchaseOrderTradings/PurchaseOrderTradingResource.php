<?php

namespace App\Filament\Resources\PurchaseOrderTradings;

use App\Filament\Resources\PurchaseOrderTradings\Pages\CreatePurchaseOrderTrading;
use App\Filament\Resources\PurchaseOrderTradings\Pages\EditPurchaseOrderTrading;
use App\Filament\Resources\PurchaseOrderTradings\Pages\ListPurchaseOrderTradings;
use App\Filament\Resources\PurchaseOrderTradings\Schemas\PurchaseOrderTradingForm;
use App\Filament\Resources\PurchaseOrderTradings\Tables\PurchaseOrderTradingsTable;
use App\Models\PurchaseOrderTrading;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PurchaseOrderTradingResource extends Resource
{
    protected static ?string $model = PurchaseOrderTrading::class;

    protected static ?string $modelLabel = 'Purchase Order';

    protected static string|UnitEnum|null $navigationGroup = 'Trading';

    protected static ?int $navigationSort = 1;

    protected static ?string $slug = 'trading/purchase-order';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PurchaseOrderTradingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PurchaseOrderTradingsTable::configure($table);
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
            'index' => ListPurchaseOrderTradings::route('/'),
            'create' => CreatePurchaseOrderTrading::route('/create'),
            'edit' => EditPurchaseOrderTrading::route('/{record}/edit'),
        ];
    }
}
