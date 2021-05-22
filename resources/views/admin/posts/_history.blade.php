@admin
<div class="mt-4">
    <div class="">History</div>
    <hr>
    @forelse($post->history as $item)
        <div>{{ $item->email }} - {{ $item->pivot->created_at->diffForHumans() }} - {{ $item->pivot->before }} - {{ $item->pivot->after }}</div>
    @empty
        <div>No history</div>
    @endforelse
</div>
@endadmin
