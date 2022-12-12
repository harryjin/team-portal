<?php

namespace App\Http\Requests;

use App\Models\RemotePc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRemotePcRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('remote_pc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:remote_pcs,id',
        ];
    }
}
