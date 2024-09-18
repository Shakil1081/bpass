@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.department.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.departments.update", [$department->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="required" for="department_name">{{ trans('cruds.department.fields.department_name') }}</label>
                        <input class="form-control {{ $errors->has('department_name') ? 'is-invalid' : '' }}" type="text" name="department_name" id="department_name" value="{{ old('department_name', $department->department_name) }}" required>
                        @if($errors->has('department_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('department_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.department.fields.department_name_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="organization_id">{{ trans('cruds.department.fields.organization') }}</label>
                        <select class="form-control select2 {{ $errors->has('organization') ? 'is-invalid' : '' }}" name="organization_id" id="organization_id" required>
                            @foreach($organizations as $id => $entry)
                                <option value="{{ $id }}" {{ (old('organization_id') ? old('organization_id') : $department->organization->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('organization'))
                            <div class="invalid-feedback">
                                {{ $errors->first('organization') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.department.fields.organization_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="created_by">{{ trans('cruds.department.fields.created_by') }}</label>
                        <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by" id="created_by">
                            @foreach($created_bies as $id => $entry)
                                <option value="{{ $id }}" {{ (old('created_by') ? old('created_by') : $department->createdBy->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('created_by'))
                            <div class="invalid-feedback">
                                {{ $errors->first('created_by') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.department.fields.created_by_helper') }}</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
