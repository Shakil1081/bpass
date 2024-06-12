<?php

namespace App\Http\Requests;

use App\Models\NonPurchaseOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNonPurchaseOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('non_purchase_order_create');
    }

    public function rules()
    {
        return [
            'created_by_id' => [
                'required',
                'integer',
            ],
            'actual_payable_amount' => [
                'required',
            ],
            'cell_no' => [
                'string',
                'nullable',
            ],
            'amount_in_words' => [
                'string',
                'nullable',
            ],
            'email' => [
                'required',
            ],
            'entry_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'non_purchase_order_no' => [
                'string',
                'nullable',
            ],
            'payment_term' => [
                'string',
                'nullable',
            ],
            'reference_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'reference_no' => [
                'string',
                'nullable',
            ],
            'supplier' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total_amount' => [
                'required',
            ],
            'vat_tax' => [
                'string',
                'nullable',
            ],
            'organization_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
