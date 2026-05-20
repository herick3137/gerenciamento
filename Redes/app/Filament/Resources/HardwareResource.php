<?php

namespace App\Filament\Resources;

use App\Models\Hardware;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\HardwareResource\Pages;

class HardwareResource extends Resource
{
    protected static ?string $model = Hardware::class;

    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('estoque_id')
                    ->relationship('estoque', 'nome')
                    ->required(),

                Forms\Components\TextInput::make('nome')
                    ->required(),

                Forms\Components\TextInput::make('ip')
                    ->required(),

                Forms\Components\TextInput::make('mac')
                    ->required(),

                Forms\Components\Select::make('status')
                    ->options([
                        'Operacional' => 'Operacional',
                        'Manutenção' => 'Manutenção',
                        'Inativo' => 'Inativo',
                    ])
                    ->default('Operacional'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('nome'),

                Tables\Columns\TextColumn::make('ip'),

                Tables\Columns\TextColumn::make('mac'),

                Tables\Columns\BadgeColumn::make('status'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHardware::route('/'),
            'create' => Pages\CreateHardware::route('/create'),
            'edit' => Pages\EditHardware::route('/{record}/edit'),
        ];
    }
}