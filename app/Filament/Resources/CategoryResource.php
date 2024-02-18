<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->placeholder('Enter the title')
                    ->minLength(1)
                    ->maxLength(155)
                    ->required(),
                TextInput::make('slug')
                    ->label('Slug')
                    ->placeholder('Enter the slug')
                    ->minLength(1)
                    ->maxLength(155)
                    ->required()
                    ->unique(ignoreRecord:true),
                ColorPicker::make('text_color')
                    ->label('Text Color')
                    ->nullable(),
                ColorPicker::make('bg_color')
                    ->label('Background Color')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),
                ColorColumn::make('text_color')
                    ->label('Text Color')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Color code copied')
                    ->copyMessageDuration(1500),
                ColorColumn::make('bg_color')
                    ->label('Background Color')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Color code copied')
                    ->copyMessageDuration(1500),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
