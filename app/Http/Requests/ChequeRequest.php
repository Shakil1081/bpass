<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChequeRequest extends FormRequest
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
            'cheque_amount' => 'required',
            'cheque_date' => 'required',
            'cheque_no' => 'required',
            'bank_account_id' => 'required',
        ];
    }
}
