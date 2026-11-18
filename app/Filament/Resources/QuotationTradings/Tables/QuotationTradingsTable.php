<?php

namespace App\Filament\Resources\QuotationTradings\Tables;

use App\Models\QuotationTrading;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class QuotationTradingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('quotation_number')
                    ->label('Nomor quotation')
                    ->formatStateUsing(fn (string $state): string => 'PMJ-QT-'.$state)
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::Medium),
                TextColumn::make('customer_company')
                    ->label('Customer')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('quotation_date')
                    ->label('Tanggal quotation')
                    ->date()
                    ->sortable(),
                TextColumn::make('valid_until')
                    ->label('Berlaku sampai')
                    ->date()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'draft' => 'Draft',
                        'sent' => 'Terkirim',
                        'accepted' => 'Disetujui',
                        'rejected' => 'Ditolak',
                        'expired' => 'Kedaluwarsa',
                        'cancelled' => 'Dibatalkan',
                        default => ucfirst($state),
                    })
                    ->sortable(),
                TextColumn::make('grand_total')
                    ->label('Total')
                    ->formatStateUsing(fn (string $state, QuotationTrading $record): string => $record->currency.' '.number_format((float) $state, 2, ',', '.'))
                    ->sortable(),
                TextColumn::make('creator.name')
                    ->label('Dibuat oleh')
                    ->toggleable(),
            ])
            ->defaultSort('quotation_date', 'desc')
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
