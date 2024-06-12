<?php

namespace App\Http\Requests;

use App\Models\TermCondition;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTermConditionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('term_condition_edit');
    }

    public function rules()
    {
        return [
            'created_by_id' => [
                'required',
                'integer',
            ],
            'term' => [
                'string',
                'nullable',
            ],
            'non_purchase_order_id' => [
                'required',
                'integer',
            ],
            'purchase_order_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
