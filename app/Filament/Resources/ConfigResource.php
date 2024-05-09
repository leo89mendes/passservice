<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConfigResource\Pages;
use App\Filament\Resources\ConfigResource\RelationManagers;
use App\Models\Config;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConfigResource extends Resource
{
    protected static ?string $model = Config::class;

    protected static ?string $navigationLabel = 'Configuração';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('time')
                    ->label('Horários')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('mobile')
                    ->label('Telefone')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('service_title')
                    ->label('Titulo dos Serviços')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('location')
                    ->label('Localização')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('footer')
                    ->label('Rodapé')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('time')
                ->label('Horários'),
                Tables\Columns\TextColumn::make('mobile')
                    ->label('Telefone'),
                Tables\Columns\TextColumn::make('service_title')
                    ->label('Titulo dos Serviços'),
                Tables\Columns\TextColumn::make('location')
                    ->label('Localização'),
                Tables\Columns\TextColumn::make('footer')
                    ->label('Rodapé'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageConfigs::route('/'),
        ];
    }    
}
