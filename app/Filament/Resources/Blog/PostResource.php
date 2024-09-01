<?php

namespace App\Filament\Resources\Blog;

use App\Filament\Resources\Blog\PostResource\Pages;
use App\Models\Blog\Post;
use App\Models\User;

use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $slug = 'blog/posts';
    protected static ?string $recordTitleAttribute = 'Título';
    protected static ?string $navigationIcon = 'fluentui-news-20';
    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->columns(3)
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([

                                Forms\Components\TextInput::make('title')->label('Título')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->maxLength(255)
                                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                                SpatieMediaLibraryFileUpload::make('media')->hiddenLabel()
                                    ->collection('blog/posts')
                                    ->multiple()
                                    ->reorderable()
                                /* ->required() */,

                                Forms\Components\Toggle::make('is_featured')->label('Destaque?')
                                    ->required(),

                                Forms\Components\MarkdownEditor::make('content')->label('Conteúdo')
                                    ->required()
                                    ->columnSpan('full'),
                            ])
                            ->columnSpan(2),

                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\Section::make()
                                    ->schema([
                                        Forms\Components\TextInput::make('slug')->label('Apelido')
                                            /* ->disabled() */
                                            ->dehydrated()
                                            ->required()
                                            ->maxLength(255)
                                            ->unique(Post::class, 'slug', ignoreRecord: true),

                                        Forms\Components\Select::make('blog_author_id')->label('Autor')
                                            ->relationship(
                                                name: 'author',
                                                modifyQueryUsing: fn (Builder $query) => $query->with('roles')->whereRelation('roles', 'name', '=', 'admin'),
                                            )
                                            ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->firstname} {$record->lastname}")
                                            ->searchable()
                                            ->preload()
                                            ->default(auth()->id()),


                                        Forms\Components\DatePicker::make('published_at')
                                            ->label('Data e Hora da Postagem')
                                            ->displayFormat('d/m/Y H:i')
                                            ->default(now())
                                    ]),
                                Forms\Components\Section::make()
                                    ->schema([
                                        Forms\Components\Select::make('blog_category_id')->label('Categoria (post)')
                                            ->relationship('category', 'name')
                                            ->searchable()
                                        /* ->required() */,
                                        SpatieTagsInput::make('tags'),
                                    ]),
                            ])

                            ->columnSpan(1)
                            ->collapsible(),





                    ]),
            ]); //fim schema main
    } //fim retorno

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('media')->label('Imagem')
                    ->collection('blog/posts')
                    ->wrap(),

                Tables\Columns\TextColumn::make('title')->label('Título')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')->label('Apelido')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('author.name')->label('Nome do autor')
                    ->searchable(['firstname', 'lastname'])
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('status')->label('Status')
                    ->badge()
                    ->getStateUsing(fn (Post $record): string => $record->published_at?->isPast() ? 'Publicado' : 'Rascunho')
                    ->colors([
                        'success' => 'Publicado',
                    ]),

                Tables\Columns\TextColumn::make('category.name')->label('Categoria')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('published_at')->label('Publicado em')
                    ->label('Data de Publicação')
                    ->date('l, d \d\e F \d\e Y'),

                Tables\Columns\TextColumn::make('updated_at')->label('Atualizado em')
                    ->label('Atualizado')
                    ->since(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->hiddenLabel()->tooltip('Detalhe'),
                Tables\Actions\EditAction::make()->hiddenLabel()->tooltip('Editar'),
                Tables\Actions\DeleteAction::make()->hiddenLabel()->tooltip('Deletar'),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return __("menu.nav_group.blog");
    }
}
