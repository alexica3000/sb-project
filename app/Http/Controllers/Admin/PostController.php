<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\StorePostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Collection;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StorePostRequest $request)
    {
        $fields = $request->except('is_published');
        Post::create($fields + ['is_published' => $request->has('is_published')]);

        return redirect()->route('posts.index')->with(['status' => 'Post has been added.']);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(StorePostRequest $request, Post $post)
    {
        $fields = $request->except('is_published');
        $post->update($fields + ['is_published' => $request->has('is_published')]);

        /** @var Collection $postTags */
        $postTags = $post->tags->keyBy('name');
        $tags = collect(explode(',', $request->input('tags')))->keyBy(fn($item) => $item);
        $syncIds = $postTags->intersectByKeys($tags)->pluck('id')->toArray();
        $tagsToAttach = $tags->diffKeys($postTags);

        foreach($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $syncIds[] = $tag->id;
        }

        $post->tags()->sync($syncIds);

        return redirect()->route('posts.index')->with(['status' => 'Post has been updated.']);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with(['status' => 'The post has been deleted.']);
    }
}
