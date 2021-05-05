@csrf
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}">
</div>

<div class="form-group">
    <label for="alias">Alias</label>
    <input type="text" class="form-control" id="alias" name="alias" value="{{ old('alias', $post->alias) }}">
</div>

<div class="form-group">
    <label for="short">Short Description</label>
    <textarea class="form-control" rows="3" name="short" id="short">{{ old('short', $post->short) }}</textarea>
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" rows="7" name="description" id="description">{{ old('description', $post->description) }}</textarea>
</div>

<div class="form-group form-check">
    <input
        type="checkbox"
        class="form-check-input"
        id="is_published"
        name="is_published"
        {{ old('is_published', $post->is_published) ? 'checked' : '' }}
    >
    <label class="form-check-label" for="is_published">Published</label>
</div>

<button type="submit" class="btn btn-primary">Save</button>
<a
    class="btn btn-secondary"
    onclick="if(confirm('Please confirm that you want to abandon this form.')) location.href='{{ route('posts.index') }}';"
>Cancel</a>
