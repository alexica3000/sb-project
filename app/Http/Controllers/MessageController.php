<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $messages = Message::latest()->get();

        return view('pages.admin.messages', compact('messages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMessageRequest $request
     * @return RedirectResponse
     */
    public function store(StoreMessageRequest $request)
    {
        try {
            Message::create($request->validated());
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
        }

        return redirect(route('contacts'));
    }
}
