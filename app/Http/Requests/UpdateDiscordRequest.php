<?php

namespace App\Http\Requests;

use App\Models\Discord;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDiscordRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('discord_edit');
    }

    public function rules()
    {
        return [
            'email' => [
                'required',
            ],
        ];
    }
}
