<?php

namespace App\Livewire;

use App\Models\Blog\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\SchemaOrg\Schema;

class Home extends Component
{
    use WithPagination;

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        seo()
            ->title($title = config('app.name'))
            ->description($description = 'Bem-vindo ao Tall CMS.')
            ->canonical($url = route('home'))
            ->addSchema(
                Schema::webPage()
                    ->name($title)
                    ->description($description)
                    ->url($url)
                    ->author(Schema::organization()->name($title))
            );

        $posts = Post::where('published_at', '<=', now())
            ->latest('published_at')
            ->paginate(6);

        return view('livewire.home', compact('posts'));
    }
}
