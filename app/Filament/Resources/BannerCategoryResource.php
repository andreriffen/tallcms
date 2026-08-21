<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerCategoryResource\Pages;
use App\Models\BannerCategory;
use Filament\Forms;
use Filament\Infolists;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class BannerCategoryResource extends Resource
{
    protected static ?string $model = BannerCategory::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = -1;
    protected static ?string $navigationIcon = 'fluentui-stack-20';
    protected static ?string $navigationLabel = 'Categorias';
    protected static ?string $navigationGroup = 'Banner';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->maxLength(255)
                    ->unique(BannerCategory::class, 'slug', ignoreRecord: true),

                Forms\Components\MarkdownEditor::make('description')
                    ->label('Descrição')
                    ->columnSpan('full'),

                Forms\Components\Toggle::make('is_active')
                    ->label('Está ativo')
                    ->default(true),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('name')->label('Nome'),
                Infolists\Components\TextEntry::make('slug')->label('Apelido'),
                Infolists\Components\TextEntry::make('description')->label('Descrição'),
                Infolists\Components\IconEntry::make('is_active')->label('Visibilidade')
                    ->label('Ativo'),
                Infolists\Components\TextEntry::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime(),
            ])
            ->columns(1)
            ->inlineLabel();
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Apelido')
                    ->searchable(),
                Tables\Columns\TextColumn::make('is_active')
                    ->label('Status')
                    ->badge()
                    ->alignCenter()
                    ->formatStateUsing(fn (string $state, $record) => match ($state) {
                        '' => 'Inativo',
                        '1' => 'Ativo',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        '' => 'danger',
                        '1' => 'success',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
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
            'index' => Pages\ListBannerCategories::route('/'),
        ];
    }
}
