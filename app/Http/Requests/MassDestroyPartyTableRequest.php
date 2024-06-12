<?php

namespace App\Http\Requests;

use App\Models\PartyTable;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPartyTableRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('party_table_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:party_tables,id',
        ];
    }
}
