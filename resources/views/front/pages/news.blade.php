@extends('layouts.front-app')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
            Latest News
        </h3>

        @forelse($news as $item)
            <div class="blog-post">
                <h2 class="blog-post-title"><a href="{{ route('news_show_front', $item->id) }}">{{ $item->title }}</a></h2>
                <p class="blog-post-meta">{{ $item->created_at }}</p>
                {!! $item->short !!}
                <hr>
                @include('front.includes.tags', ['tags' => $item->tags])
            </div>
        @empty
            <div>No news</div>
        @endforelse

        {{ $news->links() }}

    </div>
@endsection
