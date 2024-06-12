@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.purchaseOrder.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchase-orders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.id') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.actual_payable_amount') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->actual_payable_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.advance_amount') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->advance_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.amount_in_words') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->amount_in_words }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.carr_load_up_amount') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->carr_load_up_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.cell_no') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->cell_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.credit_limit') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->credit_limit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.delivery_days') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->delivery_days }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.delivery_term') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->delivery_term }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.discount_amount') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->discount_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.email') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.is_approve') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->is_approve }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.issue_date') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->issue_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.means_of_transport') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->means_of_transport }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.mpr_date') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->mpr_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.mpr_no') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->mpr_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.payment_term') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->payment_term }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.payment_type') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->payment_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.place_of_delivery') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->place_of_delivery }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.place_of_lading') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->place_of_lading }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.purchase_order_no') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->purchase_order_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.reference_date') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->reference_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.reference_no') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->reference_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.supplier_address') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->supplier_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.supplier') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->supplier }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.supplier_name') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->supplier_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.total_amount') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->total_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.vat_amount') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->vat_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.organization') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->organization->address ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.approved_by') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->approved_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.is_deleted') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->is_deleted }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.deleted') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->deleted }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.requisition') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->requisition->requisition_date ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchase-orders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection