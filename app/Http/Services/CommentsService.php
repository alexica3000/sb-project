<?php

namespace App\Http\Services;

use App\Http\Requests\Comments\StoreCommentsRequest;
use App\Models\Interfaces\HasCommentsInterface;

class CommentsService
{
    public function store(StoreCommentsRequest $request, HasCommentsInterface $resource)
    {
        $resource->comments()->create($request->validated() + ['user_id' => auth()->id()]);
    }
}
