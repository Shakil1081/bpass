@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.budget_details.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.budget-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.budget_details.fields.id') }}
                        </th>
                        <td>
                            {{ $budgetDetails->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget_details.fields.created_by') }}
                        </th>
                        <td>
                            {{ $budgetDetails->createdInfo->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget_details.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $budgetDetails->updatedInfo->name ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.budget_details.fields.bank_account_id') }}
                        </th>
                        <td>
                            {{ $budgetDetails->budgetInfo->budget_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget_details.fields.created_stamp') }}
                        </th>
                        <td>
                            {{ $budgetDetails->created_stamp }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.budget_details.fields.last_updated_stamp') }}
                        </th>
                        <td>
                            {{ $budgetDetails->last_updated_stamp }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.budget_details.fields.budget_item_name') }}
                        </th>
                        <td>
                            {{ $budgetDetails->budget_item_name }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.budget_details.fields.budget_item_ref_id') }}
                        </th>
                        <td>
                            {{ $budgetDetails->budget_item_ref_id }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.budget_details.fields.budget_item_type') }}
                        </th>
                        <td>
                            {{ $budgetDetails->budget_item_type }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.budget_details.fields.quantity') }}
                        </th>
                        <td>
                            {{ $budgetDetails->quantity }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.budget_details.fields.tolerance') }}
                        </th>
                        <td>
                            {{ $budgetDetails->tolerance }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.budget_details.fields.unit_price') }}
                        </th>
                        <td>
                            {{ $budgetDetails->unit_price }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.budget-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
