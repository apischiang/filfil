<?php

namespace App\Filament\Resources\QuotationTradings;

use App\Filament\Resources\QuotationTradings\Pages\CreateQuotationTrading;
use App\Filament\Resources\QuotationTradings\Pages\EditQuotationTrading;
use App\Filament\Resources\QuotationTradings\Pages\ListQuotationTradings;
use App\Filament\Resources\QuotationTradings\Schemas\QuotationTradingForm;
use App\Filament\Resources\QuotationTradings\Tables\QuotationTradingsTable;
use App\Models\QuotationTrading;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class QuotationTradingResource extends Resource
{
    protected static ?string $model = QuotationTrading::class;

    protected static ?string $modelLabel = 'Quotation';

    protected static string|UnitEnum|null $navigationGroup = 'Trading';

    protected static ?string $slug = 'trading/quotation';

    protected static ?int $navigationSort = 3;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return QuotationTradingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QuotationTradingsTable::configure($table);
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
            'index' => ListQuotationTradings::route('/'),
            'create' => CreateQuotationTrading::route('/create'),
            'edit' => EditQuotationTrading::route('/{record}/edit'),
        ];
    }
}
