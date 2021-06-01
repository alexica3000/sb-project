@extends('layouts.front-app')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
            Statistics
        </h3>

        <div class="blog-post">
            <div>Total Posts: <strong>{{ $totalPosts }}</strong></div>
            <div>Total News: <strong>{{ $totalNews }}</strong></div>
            <div>The user with the most posts: <strong>{{ $userMostPosts->name }}</strong></div>
            <div>Longest Post: <strong><a href="{{ route('post_show_front', $longestPost) }}">{{ $longestPost->title }}</a></strong> ({{ strlen($longestPost->body) }})</div>
            <div>Shortest Post: <strong><a href="{{ route('post_show_front', $shortestPost) }}">{{ $shortestPost->title }}</a></strong> ({{ strlen($shortestPost->body) }})</div>
            <div>Average number of articles by users: <strong>{{ $avgPosts }}</strong></div>
            <div>Most discussed post: <strong><a href="{{ route('post_show_front', $postMostDiscussed) }}">{{ $postMostDiscussed->title }}</a></strong> ({{ $postMostDiscussed->comments_count }} comments)</div>
            <div>Most volatile post: <strong><a href="{{ route('post_show_front', $postVolatile) }}">{{ $postVolatile->title }}</a></strong></div>
            <hr>
        </div>

    </div>
@endsection
