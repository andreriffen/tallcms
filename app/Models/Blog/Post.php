<?php

namespace App\Models\Blog;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Tags\HasTags;

/**
 * Post
 *
 * Representa um modelo para entidade de postagem de blog no sistema. Esta classe gerencia as informações
 * relacionadas às postagens, como autor, categoria, título, conteúdo, data de publicação e SEO.
 */
class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia, HasTags, HasUlids;

    /**
     * A tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'blog_posts';

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'blog_author_id',
        'blog_category_id',
        'title',
        'slug',
        'content',
        'content_overview',
        'published_at',
        'seo_title',
        'seo_description',
        'is_featured'
    ];

    /**
     * Os atributos que devem ser convertidos para outros tipos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'date',
        'is_featured' => 'boolean'
    ];

    /**
     * Define a relação de pertencimento do Post a um autor.
     *
     * @return BelongsTo<User, self> A relação de pertencimento ao modelo User.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'blog_author_id');
    }

    /**
     * Define a relação de pertencimento do Post a uma categoria.
     *
     * @return BelongsTo<Category, self> A relação de pertencimento ao modelo Category.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'blog_category_id');
    }
}
