<?php

namespace App\Filament\Resources\QuotationWorkshops;

use App\Filament\Resources\QuotationWorkshops\Pages\CreateQuotationWorkshop;
use App\Filament\Resources\QuotationWorkshops\Pages\EditQuotationWorkshop;
use App\Filament\Resources\QuotationWorkshops\Pages\ListQuotationWorkshops;
use App\Filament\Resources\QuotationWorkshops\Schemas\QuotationWorkshopForm;
use App\Filament\Resources\QuotationWorkshops\Tables\QuotationWorkshopsTable;
use App\Models\QuotationWorkshop;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class QuotationWorkshopResource extends Resource
{
    protected static ?string $model = QuotationWorkshop::class;

    protected static string|UnitEnum|null $navigationGroup = 'Workshop';

    protected static ?string $modelLabel = 'Quotation';

    protected static ?int $navigationSort = 3;

    protected static ?string $slug = 'workshop/quotation';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return QuotationWorkshopForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QuotationWorkshopsTable::configure($table);
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
            'index' => ListQuotationWorkshops::route('/'),
            'create' => CreateQuotationWorkshop::route('/create'),
            'edit' => EditQuotationWorkshop::route('/{record}/edit'),
        ];
    }
}
