<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'        => 'required|min:5|max:100',
            'alias'        => 'required|string|unique:posts,alias,' . (!empty($this->post) ? $this->post->id : ''),
            'short'        => 'required|string|max:255',
            'body'         => 'required',
            'is_published' => 'sometimes|accepted'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'alias' => Str::slug($this->alias),
        ]);
    }
}
