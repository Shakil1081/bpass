<?php

namespace App\Http\Requests;

use App\Models\PartyTable;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePartyTableRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('party_table_edit');
    }

    public function rules()
    {
        return [
            'party_name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
