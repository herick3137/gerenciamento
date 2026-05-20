<?php

namespace App\Filament\Resources;

use App\Models\Manutencao;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\ManutencaoResource\Pages;

class ManutencaoResource extends Resource
{
    protected static ?string $model = Manutencao::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('hardware_id')
                    ->relationship('hardware', 'nome')
                    ->required(),

                Forms\Components\Select::make('tipo')
                    ->options([
                        'preventiva' => 'Preventiva',
                        'corretiva' => 'Corretiva',
                    ])
                    ->required(),

                Forms\Components\DatePicker::make('manutencao')
                    ->required(),

                Forms\Components\Textarea::make('descricao'),

                Forms\Components\TextInput::make('responsavel'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('hardware.nome'),

                Tables\Columns\TextColumn::make('tipo'),

                Tables\Columns\TextColumn::make('manutencao'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListManutencaos::route('/'),
            'create' => Pages\CreateManutencao::route('/create'),
            'edit' => Pages\EditManutencao::route('/{record}/edit'),
        ];
    }
}