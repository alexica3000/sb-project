<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

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

        return redirect()->back()->with(['status' => 'Post has been added.']);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(StorePostRequest $request, Post $post)
    {
        $fields = $request->except('is_published');
        $post->update($fields + ['is_published' => $request->has('is_published')]);

        return redirect()->back()->with(['status' => 'Post has been updated.']);
    }

    public function show(Post $post)
    {
        return view('pages.show_post', compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with(['status' => 'The post has been deleted.']);
    }
}
