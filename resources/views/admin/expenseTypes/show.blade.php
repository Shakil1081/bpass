@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.expenseType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.expense-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.expenseType.fields.id') }}
                        </th>
                        <td>
                            {{ $expenseType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expenseType.fields.name') }}
                        </th>
                        <td>
                            {{ $expenseType->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expenseType.fields.purpose') }}
                        </th>
                        <td>
                            {{ $expenseType->purpose }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.expense-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection