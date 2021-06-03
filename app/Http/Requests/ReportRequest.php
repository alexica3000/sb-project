<?php

namespace App\Http\Requests;

use App\Http\Services\ReportService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReportRequest extends FormRequest
{
    public function authorize() : bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
            'type_data'   => 'required|array',
            'type_data.*' => ['required', Rule::in(ReportService::DATA_TYPES)],
        ];
    }
}
