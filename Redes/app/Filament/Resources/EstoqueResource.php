<?php

namespace App\Filament\Resources;

use App\Models\Estoque;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\EstoqueResource\Pages;

class EstoqueResource extends Resource
{
    protected static ?string $model = Estoque::class;

    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

    protected static ?string $navigationLabel = 'Estoque';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('nome')
                    ->required(),

                Forms\Components\Select::make('tipo')
                    ->options([
                        'Servidor' => 'Servidor',
                        'Roteador' => 'Roteador',
                        'Switch' => 'Switch',
                    ])
                    ->required(),

                Forms\Components\Select::make('voltagem')
                    ->options([
                        '110V' => '110V',
                        '220V' => '220V',
                        'Bivolt' => 'Bivolt',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('quantidade')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('estoque_minimo')
                    ->numeric()
                    ->default(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('nome'),

                Tables\Columns\TextColumn::make('tipo'),

                Tables\Columns\TextColumn::make('voltagem'),

                Tables\Columns\TextColumn::make('quantidade'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEstoques::route('/'),
            'create' => Pages\CreateEstoque::route('/create'),
            'edit' => Pages\EditEstoque::route('/{record}/edit'),
        ];
    }
}