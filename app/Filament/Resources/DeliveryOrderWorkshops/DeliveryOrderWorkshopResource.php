<?php

namespace App\Filament\Resources\DeliveryOrderWorkshops;

use App\Filament\Resources\DeliveryOrderWorkshops\Pages\CreateDeliveryOrderWorkshop;
use App\Filament\Resources\DeliveryOrderWorkshops\Pages\EditDeliveryOrderWorkshop;
use App\Filament\Resources\DeliveryOrderWorkshops\Pages\ListDeliveryOrderWorkshops;
use App\Filament\Resources\DeliveryOrderWorkshops\Schemas\DeliveryOrderWorkshopForm;
use App\Filament\Resources\DeliveryOrderWorkshops\Tables\DeliveryOrderWorkshopsTable;
use App\Models\DeliveryOrderWorkshop;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class DeliveryOrderWorkshopResource extends Resource
{
    protected static ?string $model = DeliveryOrderWorkshop::class;

    protected static string|UnitEnum|null $navigationGroup = 'Workshop';

    protected static ?string $modelLabel = 'Delivery Order';

    protected static ?int $navigationSort = 2;

    protected static ?string $slug = 'workshop/delivery-order';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return DeliveryOrderWorkshopForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DeliveryOrderWorkshopsTable::configure($table);
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
            'index' => ListDeliveryOrderWorkshops::route('/'),
            'create' => CreateDeliveryOrderWorkshop::route('/create'),
            'edit' => EditDeliveryOrderWorkshop::route('/{record}/edit'),
        ];
    }
}
