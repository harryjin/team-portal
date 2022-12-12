<?php

namespace App\Http\Requests;

use App\Models\RealPc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRealPcRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('real_pc_edit');
    }

    public function rules()
    {
        return [
            'login' => [
                'string',
                'max:30',
                'required',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
