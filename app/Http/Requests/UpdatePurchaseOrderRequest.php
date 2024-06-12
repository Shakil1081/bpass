<?php

namespace App\Http\Requests;

use App\Models\PurchaseOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePurchaseOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('purchase_order_edit');
    }

    public function rules()
    {
        return [
            'actual_payable_amount' => [
                'required',
            ],
            'amount_in_words' => [
                'string',
                'nullable',
            ],
            'cell_no' => [
                'string',
                'nullable',
            ],
            'credit_limit' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'delivery_days' => [
                'string',
                'nullable',
            ],
            'delivery_term' => [
                'string',
                'nullable',
            ],
            'is_approve' => [
                'string',
                'required',
            ],
            'issue_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'means_of_transport' => [
                'string',
                'nullable',
            ],
            'mpr_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'mpr_no' => [
                'string',
                'nullable',
            ],
            'payment_term' => [
                'string',
                'nullable',
            ],
            'payment_type' => [
                'string',
                'nullable',
            ],
            'place_of_delivery' => [
                'string',
                'nullable',
            ],
            'place_of_lading' => [
                'string',
                'nullable',
            ],
            'purchase_order_no' => [
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
            'supplier_address' => [
                'string',
                'nullable',
            ],
            'supplier' => [
                'string',
                'nullable',
            ],
            'supplier_name' => [
                'string',
                'nullable',
            ],
            'total_amount' => [
                'required',
            ],
            'organization_id' => [
                'required',
                'integer',
            ],
            'is_deleted' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'deleted' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'requisition_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
