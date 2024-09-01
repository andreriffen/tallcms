<?php

namespace App\Livewire\Post;

use App\Models\Blog\Post;
use Illuminate\View\View;
use Livewire\Component;
use Spatie\SchemaOrg\Schema;

class Show extends Component
{
    /**
     * A instância do post.
     *
     * @var \App\Models\Blog\Post
     */
    public $post;

    /**
     * Monta o componente.
     *
     * @param  string  $postSlug
     * @return void
     */
    public function mount($postSlug)
    {
        $this->post = Post::where('slug', $postSlug)->firstOrFail();

        abort_unless($this->post->published_at <= now(), 404);
    }

    /**
     * Renderiza o componente.
     *
     * @return View
     */
    public function render()
    {
        seo()
            ->title($this->post->seo_title ?? $this->post->title)
            ->description($this->post->seo_description ?? $this->post->content_overview)
            ->canonical(route('post.show', $this->post->slug))
            ->addSchema(
                Schema::article()
                    ->headline($this->post->title)
                    ->articleBody($this->post->content_overview)
                    ->image($this->post->image)
                    ->datePublished($this->post->published_at)
                    ->dateModified($this->post->updated_at)
                    ->author(Schema::person()->name($this->post->author->name))
            );

        if ($this->post->image) {
            seo()->image($this->post->image);
        }

        return view('livewire.post.show', ['post' => $this->post]);
    }
}
