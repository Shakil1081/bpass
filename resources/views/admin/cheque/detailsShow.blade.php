@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.cheque_details.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.cheques-details.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cheque_details.fields.id') }}
                        </th>
                        <td>
                            {{ $chequeDetails->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cheque_details.fields.created_by') }}
                        </th>
                        <td>
                            {{ $chequeDetails->createdInfo->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cheque_details.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $chequeDetails->updatedInfo->name ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.cheque_details.fields.cheque_id') }}
                        </th>
                        <td>
                            {{ $chequeDetails->chequeInfo->cheque_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cheque_details.fields.created_stamp') }}
                        </th>
                        <td>
                            {{ $chequeDetails->created_stamp }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.cheque_details.fields.last_updated_stamp') }}
                        </th>
                        <td>
                            {{ $chequeDetails->last_updated_stamp }}
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
