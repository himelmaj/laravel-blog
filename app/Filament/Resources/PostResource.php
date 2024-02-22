<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use DateTime;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\CheckboxColumn;
class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Content')->schema([
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
                        ->unique(ignoreRecord: true),
                    RichEditor::make('body')
                        ->label('Body')
                        ->placeholder('Enter the body')
                        ->fileAttachmentsDirectory('posts/attachments')
                        ->columnSpanFull()
                        ->required(),
                ])->columns(2),

                Section::make('Metadata')->schema([
                    FileUpload::make('image')
                        ->uploadingMessage('Uploading attachment...')
                        ->acceptedFileTypes(['image/*'])

                        ->image()
                        ->imageResizeMode('cover')
                        ->imageCropAspectRatio('1:1')
                        ->imageResizeTargetWidth('500')
                        ->imageResizeTargetHeight('500')

                        ->label('Image')
                        ->image()
                        ->directory('posts/images')
                        ->required(),


                    Select::make('user_id')
                        ->relationship('author', 'name')
                        ->label('Author')
                        ->searchable()
                        ->required()
                        ->placeholder('Select the author'),
                    Select::make('categories')
                        ->relationship('categories', 'title')
                        ->label('Categories')
                        ->searchable()
                        ->multiple()
                        ->placeholder('Select the categories'),
                ]),

                Section::make('Publishing')->schema([
                    DateTimePicker::make('published_at')
                        ->default((new DateTime())->format('Y-m-d H:i:s'))
                        ->nullable()
                        ->label('Published At'),
                    Checkbox::make('featured')
                        ->default(false)
                        ->label('Featured'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('author.name')
                    ->label('Author')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('published_at')
                    ->dateTime()
                    ->label('Published At')
                    ->searchable()
                    ->sortable(),
                CheckboxColumn::make('featured')
                    ->label('Featured')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
