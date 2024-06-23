@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bank_account.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bank-account.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bank_account.fields.id') }}
                        </th>
                        <td>
                            {{ $bankAccount->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bank_account.fields.created_by') }}
                        </th>
                        <td>
                            {{ $bankAccount->createdInfo->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bank_account.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $bankAccount->updatedInfo->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bank_account.fields.finance_bank_id') }}
                        </th>
                        <td>
                            {{ $bankAccount->finance_bank->finance_bank_name }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.bank_account.fields.organization_id') }}
                        </th>
                        <td>
                            {{ $bankAccount->organization_info->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bank_account.fields.created_stamp') }}
                        </th>
                        <td>
                            {{ $bankAccount->created_stamp }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.bank_account.fields.last_updated_stamp') }}
                        </th>
                        <td>
                            {{ $bankAccount->last_updated_stamp }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.bank_account.fields.account_name') }}
                        </th>
                        <td>
                            {{ $bankAccount->account_name }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.bank_account.fields.account_no') }}
                        </th>
                        <td>
                            {{ $bankAccount->account_no }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.bank_account.fields.branch_name') }}
                        </th>
                        <td>
                            {{ $bankAccount->branch_name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bank-account.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
