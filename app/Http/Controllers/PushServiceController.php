<?php

namespace App\Http\Controllers;

use App\Http\Services\Pushall;
use Illuminate\Http\Request;

class PushServiceController extends Controller
{
    public function form()
    {
        return view('admin.pushall.form');
    }

    public function send(Pushall $pushall)
    {
        $data = \request()->validate([
            'title' => 'required|max:80',
            'text' => 'required|max:500'
        ]);

        $pushall->send($data['title'], $data['text']);

        return redirect()->route('pushall.form')->with(['status' => 'Notification has been send successfully.']);
    }
}
