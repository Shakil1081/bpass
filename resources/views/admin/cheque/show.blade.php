@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.cheques.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cheques.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cheques.fields.id') }}
                        </th>
                        <td>
                            {{ $cheque->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cheques.fields.created_by') }}
                        </th>
                        <td>
                            {{ $cheque->createdInfo->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cheques.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $cheque->updatedInfo->name ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.cheques.fields.bank_account_id') }}
                        </th>
                        <td>
                            {{ $cheque->bankAccount->account_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cheques.fields.created_stamp') }}
                        </th>
                        <td>
                            {{ $cheque->created_stamp }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.cheques.fields.last_updated_stamp') }}
                        </th>
                        <td>
                            {{ $cheque->last_updated_stamp }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.cheques.fields.cheque_amount') }}
                        </th>
                        <td>
                            {{ $cheque->cheque_amount }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.cheques.fields.cheque_date') }}
                        </th>
                        <td>
                            {{ $cheque->cheque_date }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.cheques.fields.cheque_no') }}
                        </th>
                        <td>
                            {{ $cheque->cheque_no }}
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
