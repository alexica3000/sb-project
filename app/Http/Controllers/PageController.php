<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homePage()
    {
        return view('pages.home');
    }

    public function aboutPage()
    {
        dd('about page');
    }

    public function contactsPage()
    {
        return view('pages.contacts');
    }
}
