<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\StorePostRequest;
use App\Http\Services\TagsSynchronizer;
use App\Models\Post;

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

    public function store(StorePostRequest $request, TagsSynchronizer $synchronizer)
    {
        $fields = $request->except('is_published');
        $post = Post::create($fields + ['is_published' => $request->has('is_published')]);
        $synchronizer->sync(collect(explode(',', $request->input('tags'))), $post);

        return redirect()->route('posts.index')->with(['status' => 'Post has been added.']);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(StorePostRequest $request, Post $post, TagsSynchronizer $synchronizer)
    {
        $fields = $request->except('is_published');
        $post->update($fields + ['is_published' => $request->has('is_published')]);
        $synchronizer->sync(collect(explode(',', $request->input('tags'))), $post);

        return redirect()->route('posts.index')->with(['status' => 'Post has been updated.']);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with(['status' => 'The post has been deleted.']);
    }
}
