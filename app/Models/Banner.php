<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Banner
 *
 * Representa um modelo para entidade de banner publicitário no sistema. Esta classe gerencia informações
 * sobre banners, como categoria, título, descrição, URLs de imagem e de clique,
 * datas de exibição e visibilidade.
 */
class Banner extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory, HasUlids;

    /**
     * Atributos que são atribuíveis em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'banner_category_id',
        'sort',
        'title',
        'description',
        'image_url',
        'click_url',
        'click_url_target',
        'is_visible',
        'start_date',
        'end_date',
    ];

    /**
     * Atributos que devem ser convertidos para tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_visible' => 'boolean',
    ];

    /**
     * Define a relação entre o Banner e a categoria de Banner.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(BannerCategory::class, 'banner_category_id');
    }

    /**
     * Registra conversões de mídia para o modelo Banner.
     *
     * @param Media|null $media Instância de mídia opcional.
     *
     * @return void
     */
    public function registerMediaConversions(Media|null $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }

    /**
     * Registra as coleções de mídia para o modelo Banner.
     *
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('banners')
            ->singleFile();
    }
}
