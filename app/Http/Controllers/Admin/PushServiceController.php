<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Notifications\SendPushallRequest;
use App\Http\Services\Pushall;

class PushServiceController extends Controller
{
    public function form()
    {
        return view('admin.pushall.form');
    }

    public function send(SendPushallRequest $request, Pushall $pushall)
    {
        $pushall->send($request->input('title'), $request->input('text'));

        return redirect()->route('pushall.form')->with(['status' => 'Notification has been send successfully.']);
    }
}
