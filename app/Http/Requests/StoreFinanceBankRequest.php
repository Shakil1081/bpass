<?php

namespace App\Http\Requests;

use App\Models\FinanceBank;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFinanceBankRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('finance_bank_create');
    }

    public function rules()
    {
        return [
            'updated_by' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'finance_bank_name' => [
                'string',
                'required',
                'unique:finance_banks',
            ],
            'routing_number' => [
                'string',
                'required',
                'unique:finance_banks',
            ],
            'short_name' => [
                'string',
                'nullable',
            ],
            'swift_code' => [
                'string',
                'nullable',
            ],
        ];
    }
}
