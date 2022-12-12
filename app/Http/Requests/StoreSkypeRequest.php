<?php

namespace App\Http\Requests;

use App\Models\Skype;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSkypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('skype_create');
    }

    public function rules()
    {
        return [
            'email' => [
                'required',
            ],
            'password' => [
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
