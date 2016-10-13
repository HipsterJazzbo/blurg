<div class="post-preview">
    <a href="{{ url('posts', [$post->slug]) }}">
        <h2 class="post-title">{{ $post->title }}</h2>
        <h3 class="post-subtitle">{{ $post->excerpt }}</h3>
    </a>
    <p class="post-meta">Posted by {{ $post->user->name }} on {{ $post->created_at->toFormattedDateString() }}</p>
</div>

<hr>