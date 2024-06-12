<?php

namespace App\Http\Requests;

use App\Models\Requisition;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRequisitionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('requisition_edit');
    }

    public function rules()
    {
        return [
            'requisition_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'department_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
