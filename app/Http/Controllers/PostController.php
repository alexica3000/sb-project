<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
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
        return view('pages.admin.posts.create');
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

    public function update(Request $request, Post $post)
    {
        dd($request->all());
    }

    public function show(Post $post)
    {
        return view('pages.show_post', compact('post'));
    }
}
