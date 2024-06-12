<?php

namespace App\Http\Requests;

use App\Models\PartyGroupBd;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePartyGroupBdRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('party_group_bd_edit');
    }

    public function rules()
    {
        return [
            'group_name' => [
                'string',
                'required',
            ],
            'group_name_local' => [
                'string',
                'nullable',
            ],
            'office_site_name' => [
                'string',
                'required',
            ],
            'num_employees' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'ticker_symbol' => [
                'string',
                'nullable',
            ],
            'comments' => [
                'string',
                'nullable',
            ],
            'last_updated_tx_stamp' => [
                'string',
                'nullable',
            ],
            'employee_position_type_in_local' => [
                'string',
                'nullable',
            ],
            'group_brand_name' => [
                'string',
                'nullable',
            ],
            'tin_no' => [
                'string',
                'required',
                'unique:party_group_bds,tin_no,' . request()->route('party_group_bd')->id,
            ],
            'vat_reg_no' => [
                'string',
                'nullable',
            ],
            'registratn_category' => [
                'string',
                'nullable',
            ],
            'bin_no' => [
                'string',
                'nullable',
            ],
            'acct_status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
