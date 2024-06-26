<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BudgetDetailsRequest extends FormRequest
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
            'budget_id' => 'required',
            'created_stamp' => 'required',
            'last_updated_stamp' => 'required',
            'budget_item_name' => 'required',
            'quantity' => 'required',
            'unit_price' => 'required',
        ];
    }
}
