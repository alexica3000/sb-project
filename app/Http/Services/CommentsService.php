<?php

namespace App\Http\Services;

use App\Http\Requests\Comments\StoreCommentsRequest;
use Illuminate\Database\Eloquent\Model;

class CommentsService
{
    public function store(StoreCommentsRequest $request, Model $model)
    {
        $model->comments()->create($request->validated() + ['user_id' => auth()->id()]);
    }
}
