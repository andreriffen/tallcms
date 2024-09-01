<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Category
 *
 * Representa um modelo para entidade de categoria de postagens no blog. Esta classe gerencia informações
 * sobre categorias, incluindo nome, slug (apelido), descrição, visibilidade e SEO.
 */
class Category extends Model
{
    use HasFactory;
    use HasUlids;

    /**
     * A tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'blog_categories';

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_visible',
        'seo_title',
        'seo_description',
    ];

    /**
     * Os atributos que devem ser convertidos para outros tipos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_visible' => 'boolean',
    ];

    /**
     * Define a relação de um para muitos entre Categoria e Post.
     *
     * Uma categoria pode ter muitos posts associados a ela.
     *
     * @return HasMany<Post> A relação de um para muitos com o modelo Post.
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'blog_category_id');
    }
}
