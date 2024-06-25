@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.documents.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.documents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.documents.fields.id') }}
                        </th>
                        <td>
                            {{ $document->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.documents.fields.created_by') }}
                        </th>
                        <td>
                            {{ $document->createdInfo->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.documents.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $document->updatedInfo->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.documents.fields.organization_id') }}
                        </th>
                        <td>
                            {{ $document->organizationInfo->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.documents.fields.created_stamp') }}
                        </th>
                        <td>
                            {{ $document->created_stamp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.documents.fields.last_updated_stamp') }}
                        </th>
                        <td>
                            {{ $document->last_updated_stamp }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.documents.fields.file_path') }}
                        </th>
                        <td>
                            <img src="{{ $document->file_path }}" style="height: 100px">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.documents.fields.ref_id') }}
                        </th>
                        <td>
                            {{ $document->ref_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.documents.fields.ref_table') }}
                        </th>
                        <td>
                            {{ $document->ref_table }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.documents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
