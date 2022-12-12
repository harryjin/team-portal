<?php

namespace App\Http\Requests;

use App\Models\Skype;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSkypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('skype_edit');
    }

    public function rules()
    {
        return [
            'email' => [
                'required',
            ],
            'liveid' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
        ];
    }
}
