@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.requisition.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.requisitions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="updated_by_id">{{ trans('cruds.requisition.fields.updated_by') }}</label>
                <select class="form-control select2 {{ $errors->has('updated_by') ? 'is-invalid' : '' }}" name="updated_by_id" id="updated_by_id">
                    @foreach($updated_bies as $id => $entry)
                        <option value="{{ $id }}" {{ old('updated_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('updated_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('updated_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requisition.fields.updated_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="requisition_date">{{ trans('cruds.requisition.fields.requisition_date') }}</label>
                <input class="form-control date {{ $errors->has('requisition_date') ? 'is-invalid' : '' }}" type="text" name="requisition_date" id="requisition_date" value="{{ old('requisition_date') }}">
                @if($errors->has('requisition_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('requisition_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requisition.fields.requisition_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="department_id">{{ trans('cruds.requisition.fields.department') }}</label>
                <select class="form-control select2 {{ $errors->has('department') ? 'is-invalid' : '' }}" name="department_id" id="department_id" required>
                    @foreach($departments as $id => $entry)
                        <option value="{{ $id }}" {{ old('department_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('department'))
                    <div class="invalid-feedback">
                        {{ $errors->first('department') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requisition.fields.department_helper') }}</span>
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