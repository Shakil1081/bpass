@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.disbursements.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.disbursements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.disbursements.fields.id') }}
                        </th>
                        <td>
                            {{ $disbursement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disbursements.fields.created_by') }}
                        </th>
                        <td>
                            {{ $disbursement->createdInfo->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disbursements.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $disbursement->updatedInfo->name ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.disbursements.fields.cheque_id') }}
                        </th>
                        <td>
                            {{ $disbursement->checkInfo->cheque_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disbursements.fields.created_stamp') }}
                        </th>
                        <td>
                            {{ $disbursement->created_stamp }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.disbursements.fields.last_updated_stamp') }}
                        </th>
                        <td>
                            {{ $disbursement->last_updated_stamp }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.disbursements.fields.disbursed_on') }}
                        </th>
                        <td>
                            {{ $disbursement->disbursed_on }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.disbursements.fields.disbursed_to') }}
                        </th>
                        <td>
                            {{ $disbursement->disbursed_to }}
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
