<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index');
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

    public function show(Post $post)
    {
        return view('pages.show_post', compact('post'));
    }
}
