<?php

namespace App\Http\Requests;

use App\Models\PartyTable;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePartyTableRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('party_table_create');
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
