<?php

namespace App\Http\Requests;

use App\Models\PartyGroupBd;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPartyGroupBdRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('party_group_bd_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:party_group_bds,id',
        ];
    }
}
