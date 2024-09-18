<?php

namespace App\Http\Requests;

use App\Models\PartyGroup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePartyGroupRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('party_group_create');
    }

    public function rules()
    {
        return [
            'party' => [
                'string',
                'required',
                'unique:PARTY_GROUP',
            ],
            'group_name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
