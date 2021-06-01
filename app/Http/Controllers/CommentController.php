<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\StoreCommentsRequest;
use App\Http\Services\CommentsService;
use App\Models\News;
use App\Models\Post;

class CommentController extends Controller
{
    public function storeForPost(StoreCommentsRequest $request, Post $post, CommentsService $service)
    {
        $service->store($request, $post);

        return redirect()->route('post_show_front', $post);
    }

    public function storeForNews(StoreCommentsRequest $request, News $news, CommentsService $service)
    {
        $service->store($request, $news);

        return redirect()->route('news_show_front', $news);
    }
}
