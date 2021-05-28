@extends('layouts.front-app')

@section('content')
    <div class="col-md-8 blog-main">
        <h5 class="pb-4 mb-4">
            @can('update', $post)
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-info">Edit Post</a>
            @endcan
        </h5>

        <div class="blog-post">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
            <p class="blog-post-meta">{{ $post->created_at }}</p>
            {!! $post->body !!}
            <hr>
            @include('front.includes.tags', ['tags' => $post->tags])
            <a href="{{ route('home') }}">Home</a>

            @include('front.includes.comments', ['comments' => $post->comments, 'route' => route('comments.store', $post)])
        </div>

    </div>
@endsection
