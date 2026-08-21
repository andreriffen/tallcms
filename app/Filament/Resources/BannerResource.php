<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\CommonMarkConverter;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;
    protected static int $globalSearchResultsLimit = 10;

    protected static ?int $navigationSort = -1;
    protected static ?string $navigationIcon = 'fluentui-image-shadow-24';

    protected static function getLastSortValue(): int
    {
        return Banner::max('sort') ?? 0;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Detalhes do Banner') // 'Banner Details'
                ->tabs([
                    Forms\Components\Tabs\Tab::make('Geral') // 'General'
                    ->icon('heroicon-o-information-circle')
                        ->schema([
                            Forms\Components\Section::make('Detalhes Principais') // 'Main Details'
                            ->description('Preencha os detalhes principais do banner') // 'Fill out the main details of the banner'
                            ->icon('heroicon-o-clipboard')
                                ->schema([
                                    Forms\Components\Select::make('banner_category_id')
                                        ->label('Categoria') // 'Category'
                                        ->relationship('category', 'name')
                                        ->searchable()
                                        ->required(),
                                    Forms\Components\Select::make('is_visible')
                                        ->label('Visível') // 'Is Visible'
                                        ->default(1)
                                        ->options([
                                            0 => "Não", // 'No'
                                            1 => "Sim", // 'Yes'
                                        ])
                                        ->native(false)
                                        ->required(),
                                    Forms\Components\TextInput::make('title')
                                        ->label('Título') // 'Title'
                                        ->maxLength(255)
                                        ->columnSpan(2),
                                    Forms\Components\MarkdownEditor::make('description')
                                        ->label('Descrição') // 'Description'
                                        ->helperText('Forneça uma descrição para o banner') // 'Provide a description for the banner'
                                        ->maxLength(500)
                                        ->columnSpanFull(),
                                ])
                                ->compact()
                                ->columns(2),
                        ]),
                    Forms\Components\Tabs\Tab::make('Imagens') // 'Images'
                    ->icon('heroicon-o-photo')
                        ->schema([
                            Forms\Components\Section::make('Imagem') // 'Image'
                            ->description('Envie as imagens do banner aqui') // 'Upload banner images here'
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('media')
                                    ->hiddenLabel()
                                    ->helperText('Selecione e envie imagens para o banner') // 'Select and upload images for the banner'
                                    ->collection('banners')
                                    ->multiple()
                                    ->reorderable()
                                    ->required(),
                            ])
                                ->compact(),
                        ]),
                    Forms\Components\Tabs\Tab::make('Agendamento') // 'Scheduling'
                    ->icon('heroicon-o-calendar')
                        ->schema([
                            Forms\Components\Section::make('Agendar') // 'Schedule'
                            ->description('Defina os detalhes de agendamento do banner') // 'Set the scheduling details for the banner'
                            ->schema([
                                Forms\Components\DateTimePicker::make('start_date')
                                    ->label('Data de Início') // 'Start Date'
                                    ->helperText('Selecione a data e hora de início'), // 'Select the start date and time'
                                Forms\Components\DateTimePicker::make('end_date')
                                    ->label('Data de Término') // 'End Date'
                                    ->helperText('Selecione a data e hora de término'), // 'Select the end date and time'
                            ])
                                ->compact()
                                ->columns(2),
                        ]),
                    Forms\Components\Tabs\Tab::make('Configurações Adicionais') // 'Additional Settings'
                    ->icon('heroicon-o-cog')
                        ->schema([
                            Forms\Components\Section::make('Configurações') // 'Settings'
                            ->description('Configurações adicionais para o banner') // 'Additional settings for the banner'
                            ->schema([
                                Forms\Components\TextInput::make('sort')
                                    ->label('Ordem de Exibição') // 'Sort Order'
                                    ->helperText('Defina a ordem de exibição do banner') // 'Set the sort order of the banner'
                                    ->required()
                                    ->numeric()
                                    ->default(static::getLastSortValue() + 1),
                                Forms\Components\TextInput::make('click_url')
                                    ->label('URL de Clique') // 'Click URL'
                                    ->helperText('Digite a URL para a qual navegar quando o banner for clicado') // 'Enter the URL to navigate to when the banner is clicked'
                                    ->default('#')
                                    ->maxLength(255),
                                Forms\Components\Select::make('click_url_target')
                                    ->label('Alvo da URL de Clique') // 'Click URL Target'
                                    ->helperText('Selecione como a URL deve ser aberta') // 'Select how the URL should be opened'
                                    ->options([
                                        '_blank' => 'Nova Aba', // 'New Tab'
                                        '_self' => 'Aba Atual', // 'Current Tab'
                                        '_parent' => 'Frame Pai', // 'Parent Frame'
                                        '_top' => 'Corpo Completo da Janela' // 'Full Body of the Window'
                                    ])
                                    ->native(false),
                            ])
                                ->compact(),
                        ]),
                ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('media')->label('Mídia') // 'media' ? talvez... não sei, kkk
                ->collection('banners')
                    ->wrap(),
                Tables\Columns\TextColumn::make('title')->label('Título')
                    ->description(fn(Model $record): string => strip_tags((new CommonMarkConverter())->convert($record->description)->getContent()))
                    ->lineClamp(2)
                    ->wrap()
                    ->searchable()
                    ->extraAttributes(['class' => '!w-96']),
                Tables\Columns\TextColumn::make('category.name')->label('Categoria')
                    ->searchable()
                    ->alignCenter()
                    ->lineClamp(2),
                Tables\Columns\IconColumn::make('is_visible')->label('Visibilidade')
                    ->boolean()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('start_date')->label('Data Início')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')->label('Data Fim')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('click_url')->label('URL de click')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')->label('Criado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->label('Atualizado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')->label('Categoria')
                    ->relationship('category', 'name')
                    ->searchable(),
                Tables\Filters\TernaryFilter::make('is_visible')
                    ->label('Visibilidade') // 'Visibility'
                    ->trueLabel('Visível') // 'Visible'
                    ->falseLabel('Oculto') // 'Hidden'
                    ->nullable(),
                Tables\Filters\Filter::make('start_date')->label('Data Início')
                    ->form([
                        Forms\Components\DatePicker::make('start_date'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when($data['start_date'] ?? null, fn($query, $date) => $query->whereDate('start_date', '>=', $date));
                    }),
                Tables\Filters\Filter::make('end_date')
                    ->form([
                        Forms\Components\DatePicker::make('end_date'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when($data['end_date'] ?? null, fn($query, $date) => $query->whereDate('end_date', '<=', $date));
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort', 'asc')
            ->reorderable('sort');
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
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['category']);
    }

    public static function getGlobalSearchResultTitle(Model $record): string|Htmlable
    {
        return $record->title;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'category.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Category' => $record->category->name,
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return __("menu.nav_group.banner");
    }
}
