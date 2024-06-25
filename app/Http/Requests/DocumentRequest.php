<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'created_by' => 'required',
            'organization_id' => 'required',
            'created_stamp' => 'required',
            'last_updated_stamp' => 'required',
            'file_path' => 'nullable|file|mimes:jpeg,jpg,png,gif,pdf,doc,docx|max:2048',
        ];
    }
}
