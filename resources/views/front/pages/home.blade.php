@extends('layouts.front-app')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
            Latest Posts
        </h3>

        @if(!empty($posts) && count($posts))
            @include('front.includes.posts', ['posts' => $posts])
            {{ $posts->links() }}
        @endif
    </div>
@endsection
