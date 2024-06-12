<?php

namespace App\Http\Requests;

use App\Models\Organization;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrganizationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('organization_create');
    }

    public function rules()
    {
        return [
            'created_by_id' => [
                'required',
                'integer',
            ],
            'address' => [
                'required',
            ],
            'is_corporate' => [
                'required',
            ],
            'name' => [
                'string',
                'required',
                'unique:organizations',
            ],
            'short_name' => [
                'string',
                'required',
                'unique:organizations',
            ],
        ];
    }
}
