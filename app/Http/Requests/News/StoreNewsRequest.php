<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

class StoreNewsRequest extends FormRequest
{
    public function authorize() : bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
            'title'        => 'required|min:5|max:100',
            'short'        => 'required|string|max:255',
            'body'         => 'required|string',
            'is_published' => 'sometimes|accepted'
        ];
    }

    public function tagsCollection() : Collection
    {
        return collect(explode(',', $this->input('tags')));
    }
}
