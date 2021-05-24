<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\StoreCommentsRequest;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(StoreCommentsRequest $request, Post $post)
    {
        $post->comments()->create($request->validated() + ['user_id' => auth()->id()]);

        return redirect()->route('post_show_front', $post);
    }
}
