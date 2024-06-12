<?php

namespace App\Http\Requests;

use App\Models\PartyGroup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePartyGroupRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('party_group_edit');
    }

    public function rules()
    {
        return [
            'party' => [
                'string',
                'required',
                'unique:party_groups,party,' . request()->route('party_group')->id,
            ],
            'group_name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
