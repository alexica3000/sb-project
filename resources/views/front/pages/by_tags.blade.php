@extends('layouts.front-app')

@section('content')
    @if(!empty($posts) && count($posts))
        <div class="col-md-8 blog-main">
            <h4 class="pb-4 mb-4 font-italic border-bottom">
                Latest Posts with tag {{ $tag->name }}
            </h4>
            @include('front.includes.posts', ['posts' => $posts])
        </div>
    @endif

    @if(!empty($news) && count($news))
        <div class="col-md-8 blog-main">
            <h4 class="pb-4 mb-4 font-italic border-bottom">
                Latest News with tag {{ $tag->name }}
            </h4>
            @include('front.includes.news', ['news' => $news])
        </div>
    @endif
@endsection
