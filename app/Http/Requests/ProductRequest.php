<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
           'created_by' => 'required',
           'created_stamp' => 'required',
           'last_updated_stamp' => 'required',
           'brand' => 'required',
           'goods_receive_date' => 'required',
           'item_name' => 'required',
           'quantity' => 'required',
           'serial_no' => 'required',
           'unit_price' => 'required',
        ];
    }
}
