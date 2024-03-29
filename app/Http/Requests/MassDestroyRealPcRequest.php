<?php

namespace App\Http\Requests;

use App\Models\RealPc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRealPcRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('real_pc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:real_pcs,id',
        ];
    }
}
