<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use App\Models\News;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $posts = Post::where('is_published', 1)->with(['tags'])->orderBy('created_at', 'desc')->paginate(10);

        return view('front.pages.home', compact('posts'));
    }

    public function about()
    {
        return view('front.pages.about');
    }

    public function contacts()
    {
        return view('front.pages.contacts');
    }

    public function showPost(Post $post)
    {
        $this->authorize('showPost', $post);

        return view('front.pages.show_post', compact('post'));
    }

    public function storeMessage(StoreMessageRequest $request)
    {
        Message::create($request->validated());

        return redirect(route('contacts'));
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts()->with('tags')->get();
        $news = $tag->news()->with('tags')->get();

        return view('front.pages.by_tags', compact('tag', 'posts', 'news'));
    }

    public function news()
    {
        $news = News::query()->isActive()->latest()->paginate(10);

        return view('front.pages.news', compact('news'));
    }

    public function showNews(News $news)
    {
        $this->authorize('showNews', $news);

        return view('front.pages.show_news', compact('news'));
    }

    public function statistics()
    {
        $totalPosts = Post::query()->where('is_published', 1)->count('id');
        $totalNews = News::query()->isActive()->count('id');
        $userMostPosts = User::query()->withCount('posts')->orderBy('posts_count', 'desc')->first();
        $longestPost = Post::query()->where('is_published', 1)->orderByRaw('CHAR_LENGTH(body) DESC')->first();
        $shortestPost = Post::query()->where('is_published', 1)->orderByRaw('CHAR_LENGTH(body) ASC')->first();
        $avgPosts = User::query()->has('posts', '>=', 1)->withCount('posts')->get()->average('posts_count');
        $postVolatile = Post::query()->withCount('history')->orderBy('history_count', 'desc')->first();
        $postMostDiscussed = Post::query()->withCount('comments')->orderBy('comments_count', 'desc')->first();

        return view('front.pages.statistics', compact('totalPosts', 'totalNews', 'userMostPosts', 'longestPost', 'shortestPost', 'avgPosts', 'postMostDiscussed', 'postVolatile'));
    }
}
