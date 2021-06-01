@extends('layouts.front-app')

@section('content')
    <div class="col-md-8 blog-main">
        <div class="blog-post">
            <h2 class="blog-post-title">{{ $news->title }}</h2>
            <p class="blog-post-meta">{{ $news->created_at }}</p>
            {!! $news->body !!}
            <hr>
            <a href="{{ route('home') }}">Home</a>

            @include('front.includes.comments', ['comments' => $news->comments, 'route' => route('comments.store.news', $news)])
        </div>

    </div>
@endsection
