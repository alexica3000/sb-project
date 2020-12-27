@extends('welcome')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
            {{ $post->title }}
        </h3>

        <div class="blog-post">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
            <p class="blog-post-meta">{{ $post->created_at }}</p>
            {!! $post->description !!}
            <hr>
            <a href="{{ route('home') }}">Home</a>
        </div>

    </div>
@endsection
