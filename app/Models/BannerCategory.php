<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Classe BannerCategory
 *
 * Representa um modelo para a entidade de categoria de banners no sistema. Esta classe gerencia informações
 * sobre categorias de banners, como nome, slug, descrição e status de atividade.
 */
class BannerCategory extends Model
{
    use HasFactory, HasUlids;

    /**
     * O nome da tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'banner_categories';

    /**
     * Atributos que são atribuíveis em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'slug', 'description', 'is_active'];

    /**
     * Atributos que devem ser convertidos para tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Define a relação entre a Categoria de Banner e os Banners.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function banners()
    {
        return $this->hasMany(Banner::class, 'banner_category_id');
    }
}
