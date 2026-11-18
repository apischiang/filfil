<?php

namespace App\Filament\Resources\PurchaseOrderWorkshops;

use App\Filament\Resources\PurchaseOrderWorkshops\Pages\CreatePurchaseOrderWorkshop;
use App\Filament\Resources\PurchaseOrderWorkshops\Pages\EditPurchaseOrderWorkshop;
use App\Filament\Resources\PurchaseOrderWorkshops\Pages\ListPurchaseOrderWorkshops;
use App\Filament\Resources\PurchaseOrderWorkshops\Schemas\PurchaseOrderWorkshopForm;
use App\Filament\Resources\PurchaseOrderWorkshops\Tables\PurchaseOrderWorkshopsTable;
use App\Models\PurchaseOrderWorkshop;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PurchaseOrderWorkshopResource extends Resource
{
    protected static ?string $model = PurchaseOrderWorkshop::class;

    protected static string|UnitEnum|null $navigationGroup = 'Workshop';

    protected static ?string $modelLabel = 'Purchase Order';

    protected static ?int $navigationSort = 1;

    protected static ?string $slug = 'workshop/purchase-order';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PurchaseOrderWorkshopForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PurchaseOrderWorkshopsTable::configure($table);
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
            'index' => ListPurchaseOrderWorkshops::route('/'),
            'create' => CreatePurchaseOrderWorkshop::route('/create'),
            'edit' => EditPurchaseOrderWorkshop::route('/{record}/edit'),
        ];
    }
}
