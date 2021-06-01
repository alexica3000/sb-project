<?php

namespace App\Http\Services;

use App\Http\Requests\Comments\StoreCommentsRequest;
use App\Models\Interfaces\CommentsInterface;

class CommentsService
{
    public function store(StoreCommentsRequest $request, CommentsInterface $resource)
    {
        $resource->comments()->create($request->validated() + ['user_id' => auth()->id()]);
    }
}
