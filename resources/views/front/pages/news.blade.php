@extends('layouts.front-app')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
            Latest News
        </h3>

        @include('front.includes.news', ['news' => $news])
        {{ $news->links() }}
    </div>
@endsection
