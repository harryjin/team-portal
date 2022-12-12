<?php

namespace App\Http\Requests;

use App\Models\RemotePc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRemotePcRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('remote_pc_create');
    }

    public function rules()
    {
        return [
            'rid' => [
                'string',
                'required',
            ],
            'rpassword' => [
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
