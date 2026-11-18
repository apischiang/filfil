<?php

namespace App\Filament\Resources\QuotationTradings\Schemas;

use App\Models\QuotationTrading;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class QuotationTradingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Quotation')
                    ->schema([
                        TextInput::make('quotation_number')
                            ->label('Nomor quotation')
                            ->default('PMJ-QT-'.random_int(100000, 999999))
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->maxLength(32)
                            ->unique(QuotationTrading::class, 'quotation_number', ignoreRecord: true),
                        TextInput::make('public_url')
                            ->label('Link publik')
                            ->disabled()
                            ->dehydrated(false)
                            ->copyable()
                            ->formatStateUsing(fn (?QuotationTrading $record): string => $record
                                ? route('quotation.public', $record->public_token)
                                : 'Tersedia setelah quotation disimpan'),
                        Select::make('customer_trading_id')
                            ->label('Customer')
                            ->relationship('customerTrading', 'company')
                            ->searchable()
                            ->preload()
                            ->required(),
                        DatePicker::make('quotation_date')
                            ->label('Tanggal quotation')
                            ->default(now())
                            ->required(),
                        DatePicker::make('valid_until')
                            ->label('Berlaku sampai'),
                        Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'sent' => 'Terkirim',
                                'accepted' => 'Disetujui',
                                'rejected' => 'Ditolak',
                                'expired' => 'Kedaluwarsa',
                                'cancelled' => 'Dibatalkan',
                            ])
                            ->default('draft')
                            ->required(),
                        Select::make('currency')
                            ->options([
                                'IDR' => 'IDR — Rupiah',
                                'USD' => 'USD — US Dollar',
                            ])
                            ->default('IDR')
                            ->required(),
                    ])
                    ->columns(2)
                    ->columnSpan(['lg' => fn (?QuotationTrading $record): int => $record === null ? 3 : 2]),

                Section::make('Item quotation')
                    ->schema([
                        Repeater::make('items')
                            ->relationship()
                            ->label('Daftar item')
                            ->schema([
                                TextInput::make('item_name')
                                    ->label('Nama item')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('description')
                                    ->label('Deskripsi'),
                                FileUpload::make('image_path')
                                    ->label('Gambar barang')
                                    ->image()
                                    ->disk('public')
                                    ->directory('quotations/items')
                                    ->visibility('public')
                                    ->maxSize(5120),
                                TextInput::make('quantity')
                                    ->label('Kuantitas')
                                    ->numeric()
                                    ->minValue(0.001)
                                    ->default(1)
                                    ->required(),
                                TextInput::make('unit')
                                    ->label('Satuan')
                                    ->default('pcs')
                                    ->required()
                                    ->maxLength(50),
                                TextInput::make('unit_price')
                                    ->label('Harga satuan')
                                    ->numeric()
                                    ->minValue(0)
                                    ->default(0)
                                    ->required(),
                                TextInput::make('discount_amount')
                                    ->label('Diskon item')
                                    ->numeric()
                                    ->minValue(0)
                                    ->default(0)
                                    ->required(),
                                TextInput::make('tax_rate')
                                    ->label('Pajak (%)')
                                    ->numeric()
                                    ->minValue(0)
                                    ->maxValue(100)
                                    ->suffix('%')
                                    ->default(0)
                                    ->required(),
                            ])
                            ->columnSpan(['lg' => fn (?QuotationTrading $record): int => $record === null ? 3 : 2])
                            ->columns(2)
                            ->minItems(1)
                            ->defaultItems(1)
                            ->addActionLabel('Tambah item'),
                    ]),

                Section::make('Ketentuan')
                    ->schema([
                        Textarea::make('payment_terms')
                            ->label('Syarat pembayaran')
                            ->rows(3),
                        Textarea::make('delivery_terms')
                            ->label('Syarat pengiriman')
                            ->rows(3),
                        Textarea::make('notes')
                            ->label('Catatan')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
