<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

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
}
