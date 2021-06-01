@forelse($posts as $post)
    <div class="blog-post">
        <h2 class="blog-post-title"><a href="{{ route('post_show_front', $post->id) }}">{{ $post->title }}</a></h2>
        <p class="blog-post-meta">{{ $post->created_at }}</p>
        {!! $post->short !!}
        <hr>
        @include('front.includes.tags', ['tags' => $post->tags])
    </div>
@empty
    <div>No posts</div>
@endforelse
