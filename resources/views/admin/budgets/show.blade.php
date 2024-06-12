@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.budget.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.budgets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.budget.fields.id') }}
                        </th>
                        <td>
                            {{ $budget->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget.fields.created_by') }}
                        </th>
                        <td>
                            {{ $budget->created_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $budget->updated_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget.fields.budget_amount') }}
                        </th>
                        <td>
                            {{ $budget->budget_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget.fields.budget_date') }}
                        </th>
                        <td>
                            {{ $budget->budget_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget.fields.budget_for') }}
                        </th>
                        <td>
                            {{ $budget->budget_for }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget.fields.budget_name') }}
                        </th>
                        <td>
                            {{ $budget->budget_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget.fields.budget_reference') }}
                        </th>
                        <td>
                            {{ $budget->budget_reference }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget.fields.close_reason') }}
                        </th>
                        <td>
                            {{ $budget->close_reason }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget.fields.expense_type') }}
                        </th>
                        <td>
                            {{ $budget->expense_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget.fields.is_closed') }}
                        </th>
                        <td>
                            {{ $budget->is_closed }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget.fields.purpose') }}
                        </th>
                        <td>
                            {{ $budget->purpose }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget.fields.remarks') }}
                        </th>
                        <td>
                            {{ $budget->remarks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget.fields.valid_up_to') }}
                        </th>
                        <td>
                            {{ $budget->valid_up_to }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget.fields.assign_user') }}
                        </th>
                        <td>
                            {{ $budget->assign_user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget.fields.department') }}
                        </th>
                        <td>
                            {{ $budget->department->department_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget.fields.organization') }}
                        </th>
                        <td>
                            {{ $budget->organization->address ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget.fields.proposed_by') }}
                        </th>
                        <td>
                            {{ $budget->proposed_by->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.budgets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection