<?php

namespace App\Filament\Resources\CustomerTradings\Schemas;

use App\Models\CustomerTrading;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CustomerTradingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Customer')
                    ->schema([
                        TextInput::make('uniqueID')
                            ->label('ID')
                            ->prefix('PMJ-CT-')
                            ->maxLength(10)
                            ->unique(ignoreRecord: true)
                            ->required(),

                        TextInput::make('name')
                            ->maxLength(255)
                            ->required(),

                        TextInput::make('company')
                            ->maxLength(255)
                            ->required(),

                        TextInput::make('email')
                            ->label('Email address')
                            ->required()
                            ->email()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        TextInput::make('phone')
                            ->tel()
                            ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),

                        FileUpload::make('logo'),

                        RichEditor::make('notes'),

                        Select::make('status')
                            ->label('Tipe Perusahaan')
                            ->required()
                            ->options([
                                'pt' => 'PT',
                                'cv' => 'CV',
                            ]),
                    ])
                    ->columns(2)
                    ->columnSpan(['lg' => fn (?CustomerTrading $record): int => $record === null ? 3 : 2]),

                Section::make()
                    ->schema([
                        TextEntry::make('created_at')
                            ->state(fn (CustomerTrading $record): ?string => $record->created_at?->diffForHumans()),

                        TextEntry::make('updated_at')
                            ->label('Last modified at')
                            ->state(fn (CustomerTrading $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?CustomerTrading $record): bool => $record === null),
            ])
            ->columns(3);
    }
}
