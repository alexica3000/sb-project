<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use App\Models\News;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $posts = Post::where('is_published', 1)->with(['tags'])->orderBy('created_at', 'desc')->paginate(4);

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
        $posts = $tag->posts()->with('tags')->paginate(4);

        return view('front.pages.home', compact('posts'));
    }

    public function news()
    {
        $news = News::query()->latest()->paginate();
    }
}
