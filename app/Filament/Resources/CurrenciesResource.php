<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CurrenciesResource\Pages;
use App\Filament\Resources\CurrenciesResource\RelationManagers;
use App\Models\Currencies;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;

class CurrenciesResource extends Resource
{
    protected static ?string $model = Currencies::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('num_code')
                    ->numeric()
                    ->required(),
                TextInput::make('char_code')->required(),
                TextInput::make('nominal')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(100)
                    ->required(),
                TextInput::make('value')
                    ->numeric()
                    ->required()
                    ->placeholder('Enter the value'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('num_code'),
                Tables\Columns\TextColumn::make('char_code'),
                Tables\Columns\TextColumn::make('nominal'),
                Tables\Columns\TextColumn::make('value'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListCurrencies::route('/'),
            'create' => Pages\CreateCurrencies::route('/create'),
            'edit' => Pages\EditCurrencies::route('/{record}/edit'),
        ];
    }
}
