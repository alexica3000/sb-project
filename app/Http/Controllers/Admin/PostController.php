<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\StorePostRequest;
use App\Http\Requests\TagsRequest;
use App\Http\Services\TagsSynchronizer;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index()
    {
        $posts = Cache::tags(['posts'])->remember('index_posts|' . auth()->id(), 3600, function() {
            return auth()->user()->posts()->orderBy('id', 'desc')->paginate(20);
        });

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StorePostRequest $request, TagsRequest $tagsRequest, TagsSynchronizer $synchronizer)
    {
        $fields = $request->except('is_published');
        $post = auth()->user()->posts()->create($fields + ['is_published' => $request->has('is_published')]);
        $synchronizer->sync($tagsRequest->tagsCollection(), $post);

        return redirect()->route('posts.index')->with(['status' => 'Post has been added.']);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('admin.posts.edit', compact('post'));
    }

    public function update(StorePostRequest $request, TagsRequest $tagsRequest, Post $post, TagsSynchronizer $synchronizer)
    {
        $this->authorize('update', $post);
        $fields = $request->except('is_published');
        $post->update($fields + ['is_published' => $request->has('is_published')]);
        $synchronizer->sync($tagsRequest->tagsCollection(), $post);

        return redirect()->route('posts.index')->with(['status' => 'Post has been updated.']);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('posts.index')->with(['status' => 'The post has been deleted.']);
    }

    public function allPosts()
    {
        $posts = Cache::tags(['posts'])->remember('all_posts', 3600, function() {
            return Post::latest()->paginate(20);
        });

        return view('admin.posts.index', compact('posts'));
    }
}
