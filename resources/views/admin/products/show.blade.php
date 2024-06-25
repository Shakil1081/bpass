@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.products.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.products.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.products.fields.id') }}
                        </th>
                        <td>
                            {{ $product->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.products.fields.created_by') }}
                        </th>
                        <td>
                            {{ $product->createdInfo->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.products.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $product->updatedInfo->name ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.products.fields.non_purchase_order_id') }}
                        </th>
                        <td>
                            {{ $product->nonPurchasedInfo->non_purchase_order_no ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.products.fields.purchase_order_id') }}
                        </th>
                        <td>
                            {{ $product->purchasedInfo->purchase_order_no ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.products.fields.budget_id') }}
                        </th>
                        <td>
                            {{ $product->budgetInfo->budget_name ?? '' }}
                        </td>
                    </tr>
{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.products.fields.budget_details_id') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            {{ $product->bankAccount->account_name }}--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                    <tr>
                        <th>
                            {{ trans('cruds.products.fields.created_stamp') }}
                        </th>
                        <td>
                            {{ $product->created_stamp }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.products.fields.last_updated_stamp') }}
                        </th>
                        <td>
                            {{ $product->last_updated_stamp }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.products.fields.brand') }}
                        </th>
                        <td>
                            {{ $product->brand }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.products.fields.goods_receive_date') }}
                        </th>
                        <td>
                            {{ $product->goods_receive_date }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.products.fields.item_name') }}
                        </th>
                        <td>
                            {{ $product->item_name }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.products.fields.origin') }}
                        </th>
                        <td>
                            {{ $product->origin }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.products.fields.quantity') }}
                        </th>
                        <td>
                            {{ $product->quantity }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.products.fields.serial_no') }}
                        </th>
                        <td>
                            {{ $product->serial_no }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.products.fields.size_or_capacity') }}
                        </th>
                        <td>
                            {{ $product->size_or_capacity }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.products.fields.unit_price') }}
                        </th>
                        <td>
                            {{ $product->unit_price }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.products.fields.uom') }}
                        </th>
                        <td>
                            {{ $product->uom }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.products.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
