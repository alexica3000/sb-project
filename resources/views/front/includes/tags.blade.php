@php
    $tags = $tags ?? collect();
@endphp

@if($tags->isNotEmpty())
    <div>
        @foreach($tags as $tag)
            <a href="{{ route('posts.tag', $tag) }}" class="badge badge-secondary">{{ $tag->name }}</a>
        @endforeach
    </div>
@endif
