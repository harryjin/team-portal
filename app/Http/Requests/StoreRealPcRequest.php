<?php

namespace App\Http\Requests;

use App\Models\RealPc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRealPcRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('real_pc_create');
    }

    public function rules()
    {
        return [
            'login' => [
                'string',
                'max:30',
                'required',
            ],
            'password' => [
                'required',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
