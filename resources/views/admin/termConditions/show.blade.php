@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.termCondition.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.term-conditions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.termCondition.fields.id') }}
                        </th>
                        <td>
                            {{ $termCondition->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.termCondition.fields.created_by') }}
                        </th>
                        <td>
                            {{ $termCondition->createdBy->full_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.termCondition.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $termCondition->updatedBy->full_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.termCondition.fields.term') }}
                        </th>
                        <td>
                            {{ $termCondition->term }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.termCondition.fields.non_purchase_order') }}
                        </th>
                        <td>
                            {{ $termCondition->non_purchase_order->actual_payable_amount ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.termCondition.fields.purchase_order') }}
                        </th>
                        <td>
                            {{ $termCondition->purchase_order->actual_payable_amount ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.term-conditions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
