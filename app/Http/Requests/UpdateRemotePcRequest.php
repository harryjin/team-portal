<?php

namespace App\Http\Requests;

use App\Models\RemotePc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRemotePcRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('remote_pc_edit');
    }

    public function rules()
    {
        return [
            'rid' => [
                'string',
                'required',
            ],
            'login' => [
                'string',
                'nullable',
            ],
            'type' => [
                'required',
            ],
        ];
    }
}
