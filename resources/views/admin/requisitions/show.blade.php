@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.requisition.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.requisitions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.requisition.fields.id') }}
                        </th>
                        <td>
                            {{ $requisition->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requisition.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $requisition->updated_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requisition.fields.requisition_date') }}
                        </th>
                        <td>
                            {{ $requisition->requisition_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requisition.fields.department') }}
                        </th>
                        <td>
                            {{ $requisition->department->department_name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.requisitions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection