<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarCodeRequest extends FormRequest
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
            'bar_code' => 'required',
//            'invoice_id' => 'required',
        ];
    }
}
