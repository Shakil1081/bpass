<?php

namespace App\Http\Requests;

use App\Models\Budget;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBudgetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('budget_edit');
    }

    public function rules()
    {
        return [
            'created_by_id' => [
                'required',
                'integer',
            ],
            'budget_amount' => [
                'required',
            ],
            'budget_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'budget_for' => [
                'string',
                'nullable',
            ],
            'budget_name' => [
                'string',
                'nullable',
            ],
            'budget_reference' => [
                'string',
                'required',
            ],
            'close_reason' => [
                'string',
                'nullable',
            ],
            'expense_type' => [
                'string',
                'nullable',
            ],
            'is_closed' => [
                'string',
                'nullable',
            ],
            'purpose' => [
                'string',
                'nullable',
            ],
            'valid_up_to' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'department_id' => [
                'required',
                'integer',
            ],
            'organization_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
