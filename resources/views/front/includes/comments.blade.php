<div class="font-weight-bold mt-3">Comments</div>
<hr>

@auth
    <form method="post" action="{{ route('comments.store', $post) }}">
        @csrf
        <div class="form-group">
            <textarea name="body" id="body" rows="4" style="width: 100%" class="form-control border rounded"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-info btn-sm" value="Add" />
        </div>
    </form>
@else
    <small>Please login.</small>
@endauth

<hr>

@forelse($comments as $comment)
    <div class="display-comment">
        <strong>{{ $comment->user->name }}</strong>
        <small>{{ $comment->created_at->diffForHumans() }}</small>
        <p>{{ $comment->body }}</p>
    </div>
@empty
    <div class="mt-3">No comments</div>
@endforelse
