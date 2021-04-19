@extends('welcome')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
            Latest Posts
        </h3>

        @if(!empty($posts) && count($posts))
            @foreach($posts as $post)
                <div class="blog-post">
                    <h2 class="blog-post-title"><a href="{{ route('post_show_front', $post->id) }}">{{ $post->title }}</a></h2>
                    <p class="blog-post-meta">{{ $post->created_at }}</p>
                    {!! $post->short !!}
                </div>
            @endforeach
                {{ $posts->links() }}
        @endif
    </div>
@endsection
