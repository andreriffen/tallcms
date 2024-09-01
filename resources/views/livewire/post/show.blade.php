<div>
    <h1>{{ $post->title }}</h1>
    <img src="{{ $post->image }}" alt="{{ $post->title }}">
    <p>{{ $post->content }}</p>
    <small>Publicado em: {{ $post->published_at->format('d/m/Y') }}</small>
</div>
