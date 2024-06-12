@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.organization.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.organizations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.id') }}
                        </th>
                        <td>
                            {{ $organization->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.created_by') }}
                        </th>
                        <td>
                            {{ $organization->created_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $organization->updated_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.address') }}
                        </th>
                        <td>
                            {{ $organization->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.is_corporate') }}
                        </th>
                        <td>
                            {{ App\Models\Organization::IS_CORPORATE_SELECT[$organization->is_corporate] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.logo') }}
                        </th>
                        <td>
                            @if($organization->logo)
                                <a href="{{ $organization->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $organization->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.name') }}
                        </th>
                        <td>
                            {{ $organization->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organization.fields.short_name') }}
                        </th>
                        <td>
                            {{ $organization->short_name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.organizations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection