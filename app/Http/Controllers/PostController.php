<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('pages.admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @return RedirectResponse
     */
    public function store(StorePostRequest $request)
    {
        try {
            $fields = $request->except('is_published');
            Post::create($fields + ['is_published' => $request->has('is_published')]);

            return redirect()->back()->with(['status' => 'Post has been added.']);
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
            return redirect()->back()->withErrors(['Post has not been added.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return View
     */
    public function show(Post $post)
    {
        return view('pages.show_post', compact('post'));
    }
}
