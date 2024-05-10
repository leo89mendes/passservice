<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServicesResource\Pages;
use App\Filament\Resources\ServicesResource\RelationManagers;
use App\Models\Services;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServicesResource extends Resource
{
    protected static ?string $model = Services::class;

    protected static ?string $navigationLabel = 'Serviços';

    protected static ?string $navigationIcon = 'heroicon-m-truck';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->label('Titulo')
                    ->maxLength(255),
                Forms\Components\RichEditor::make('description')
                    ->label('Descrição')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->label('Imagem')
                    ->directory('images/services')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->label('Titulo'),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()->wrap()->html()
                    ->label('Descrição'),
                Tables\Columns\ImageColumn::make('image')->label('Iamgem')->size(80),
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
            'index' => Pages\ManageServices::route('/'),
        ];
    }    
}
