<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homePage()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(4);

        return view('pages.home', compact('posts'));
    }

    public function aboutPage()
    {
        return view('pages.about');
    }

    public function contactsPage()
    {
        return view('pages.contacts');
    }
}
