<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseOrderEntryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'department_id' => 'required',
            'mpr_date' => 'required',
            'purchase_order' => 'required',
            'purchase_order_date' => 'required',
            'mpr_no' => 'required',
            'mpr_received_date' => 'required',
            'supplier_name' => 'required',
            'supplier_cell_no' => 'required',
            'supplier_address' => 'required',
            'delivery_period' => 'required',
//            'payment_type' => 'required',
            'credit_period' => 'required',
            'item_name.*' => 'required',
            'quantity.*' => 'required',
            'uom.*' => 'required',
            'unit_price.*' => 'required',
            'total_amount' => 'required',
            'net_payable_amount' => 'required',
            'terms_and_conditions' => 'required',
        ];
    }
}
