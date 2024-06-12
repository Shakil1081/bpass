@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.financeBank.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.finance-banks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.financeBank.fields.id') }}
                        </th>
                        <td>
                            {{ $financeBank->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.financeBank.fields.created_by') }}
                        </th>
                        <td>
                            {{ $financeBank->created_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.financeBank.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $financeBank->updated_by }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.financeBank.fields.finance_bank_name') }}
                        </th>
                        <td>
                            {{ $financeBank->finance_bank_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.financeBank.fields.routing_number') }}
                        </th>
                        <td>
                            {{ $financeBank->routing_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.financeBank.fields.short_name') }}
                        </th>
                        <td>
                            {{ $financeBank->short_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.financeBank.fields.swift_code') }}
                        </th>
                        <td>
                            {{ $financeBank->swift_code }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.finance-banks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection