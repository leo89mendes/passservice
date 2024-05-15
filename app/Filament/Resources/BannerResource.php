<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-s-document';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('desktop')->multiple()->image()
                ->disk('public')->directory('banners/desktop')
                ->imageEditor()->maxFiles(3)
                ->imageResizeTargetWidth('2920')
                ->imageResizeTargetHeight('1080'),
                FileUpload::make('mobile')->multiple()->image()
                ->disk('public')->directory('banners/mobile')
                ->imageEditor()->maxFiles(3)
                ->imageResizeTargetWidth('800')
                ->minSize(480)
                ->imageResizeTargetHeight('180'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('desktop')->size(150)
                ->stacked()->limit(3),
                ImageColumn::make('mobile')->size(150)
                ->stacked()->limit(3)
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                //Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListBanners::route('/'),
        ];
    }
}
