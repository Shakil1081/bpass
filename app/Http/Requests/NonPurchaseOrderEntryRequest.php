<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NonPurchaseOrderEntryRequest extends FormRequest
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
            'non_purchase_order_no' => 'required',
            'entry_date' => 'required',
            'supplier_name' => 'required',
            'supplier_cell_no' => 'required',
            'supplier_address' => 'required',
            'payment_type' => 'required',
            'credit_period' => 'required',
            'item_name.*' => 'required',
            'quantity.*' => 'required',
            'uom.*' => 'required',
            'unit_price.*' => 'required',
            'total_amount' => 'required',
            'net_payable_amount' => 'required',
        ];
    }
}
