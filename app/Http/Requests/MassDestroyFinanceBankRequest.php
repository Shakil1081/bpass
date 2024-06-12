<?php

namespace App\Http\Requests;

use App\Models\FinanceBank;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFinanceBankRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('finance_bank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:finance_banks,id',
        ];
    }
}
