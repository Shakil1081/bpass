@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.nonPurchaseOrder.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.non-purchase-orders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.nonPurchaseOrder.fields.id') }}
                        </th>
                        <td>
                            {{ $nonPurchaseOrder->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nonPurchaseOrder.fields.created_by') }}
                        </th>
                        <td>
                            {{ $nonPurchaseOrder->created_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nonPurchaseOrder.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $nonPurchaseOrder->updated_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nonPurchaseOrder.fields.actual_payable_amount') }}
                        </th>
                        <td>
                            {{ $nonPurchaseOrder->actual_payable_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nonPurchaseOrder.fields.advance_amount') }}
                        </th>
                        <td>
                            {{ $nonPurchaseOrder->advance_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nonPurchaseOrder.fields.cell_no') }}
                        </th>
                        <td>
                            {{ $nonPurchaseOrder->cell_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nonPurchaseOrder.fields.amount_in_words') }}
                        </th>
                        <td>
                            {{ $nonPurchaseOrder->amount_in_words }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nonPurchaseOrder.fields.credit_limit') }}
                        </th>
                        <td>
                            {{ $nonPurchaseOrder->credit_limit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nonPurchaseOrder.fields.discount_amount') }}
                        </th>
                        <td>
                            {{ $nonPurchaseOrder->discount_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nonPurchaseOrder.fields.email') }}
                        </th>
                        <td>
                            {{ $nonPurchaseOrder->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nonPurchaseOrder.fields.entry_date') }}
                        </th>
                        <td>
                            {{ $nonPurchaseOrder->entry_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nonPurchaseOrder.fields.non_purchase_order_no') }}
                        </th>
                        <td>
                            {{ $nonPurchaseOrder->non_purchase_order_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nonPurchaseOrder.fields.payment_term') }}
                        </th>
                        <td>
                            {{ $nonPurchaseOrder->payment_term }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nonPurchaseOrder.fields.reference_date') }}
                        </th>
                        <td>
                            {{ $nonPurchaseOrder->reference_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nonPurchaseOrder.fields.reference_no') }}
                        </th>
                        <td>
                            {{ $nonPurchaseOrder->reference_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nonPurchaseOrder.fields.supplier') }}
                        </th>
                        <td>
                            {{ $nonPurchaseOrder->supplier }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nonPurchaseOrder.fields.supplier_address') }}
                        </th>
                        <td>
                            {{ $nonPurchaseOrder->supplier_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nonPurchaseOrder.fields.total_amount') }}
                        </th>
                        <td>
                            {{ $nonPurchaseOrder->total_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nonPurchaseOrder.fields.vat_tax') }}
                        </th>
                        <td>
                            {{ $nonPurchaseOrder->vat_tax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nonPurchaseOrder.fields.organization') }}
                        </th>
                        <td>
                            {{ $nonPurchaseOrder->organization->address ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.non-purchase-orders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection