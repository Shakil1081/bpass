@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.barcodes.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.barcodes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.barcodes.fields.id') }}
                        </th>
                        <td>
                            {{ $barcode->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barcodes.fields.created_by') }}
                        </th>
                        <td>
                            {{ $barcode->createdInfo->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barcodes.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $barcode->updatedInfo->name ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.barcodes.fields.invoice_id') }}
                        </th>
                        <td>
{{--                            {{ $barcode->invoiceInfo->invoice }}--}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barcodes.fields.created_stamp') }}
                        </th>
                        <td>
                            {{ $barcode->created_stamp }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.barcodes.fields.last_updated_stamp') }}
                        </th>
                        <td>
                            {{ $barcode->last_updated_stamp }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.barcodes.fields.bar_code') }}
                        </th>
                        <td>
                            {{ $barcode->bar_code }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cheques.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
