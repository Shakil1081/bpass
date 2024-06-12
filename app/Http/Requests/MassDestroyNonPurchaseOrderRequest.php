<?php

namespace App\Http\Requests;

use App\Models\NonPurchaseOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNonPurchaseOrderRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('non_purchase_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:non_purchase_orders,id',
        ];
    }
}
