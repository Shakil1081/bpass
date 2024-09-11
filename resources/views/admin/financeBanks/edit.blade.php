@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.financeBank.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.finance-banks.update", [$financeBank->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="created_by_id">{{ trans('cruds.financeBank.fields.created_by') }}</label>
                        <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by_id" id="created_by_id">
                            @foreach($created_bies as $id => $entry)
                                <option value="{{ $id }}" {{ (old('created_by_id') ? old('created_by_id') : $financeBank->createdBy->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('created_by'))
                            <div class="invalid-feedback">
                                {{ $errors->first('created_by') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.financeBank.fields.created_by_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="updated_by">{{ trans('cruds.financeBank.fields.updated_by') }}</label>
                        <input class="form-control date {{ $errors->has('updated_by') ? 'is-invalid' : '' }}" type="text" name="updated_by" id="updated_by" value="{{ old('updated_by', $financeBank->updated_by) }}">
                        @if($errors->has('updated_by'))
                            <div class="invalid-feedback">
                                {{ $errors->first('updated_by') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.financeBank.fields.updated_by_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="finance_bank_name">{{ trans('cruds.financeBank.fields.finance_bank_name') }}</label>
                        <input class="form-control {{ $errors->has('finance_bank_name') ? 'is-invalid' : '' }}" type="text" name="finance_bank_name" id="finance_bank_name" value="{{ old('finance_bank_name', $financeBank->finance_bank_name) }}" required>
                        @if($errors->has('finance_bank_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('finance_bank_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.financeBank.fields.finance_bank_name_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="routing_number">{{ trans('cruds.financeBank.fields.routing_number') }}</label>
                        <input class="form-control {{ $errors->has('routing_number') ? 'is-invalid' : '' }}" type="text" name="routing_number" id="routing_number" value="{{ old('routing_number', $financeBank->routing_number) }}" required>
                        @if($errors->has('routing_number'))
                            <div class="invalid-feedback">
                                {{ $errors->first('routing_number') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.financeBank.fields.routing_number_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="short_name">{{ trans('cruds.financeBank.fields.short_name') }}</label>
                        <input class="form-control {{ $errors->has('short_name') ? 'is-invalid' : '' }}" type="text" name="short_name" id="short_name" value="{{ old('short_name', $financeBank->short_name) }}">
                        @if($errors->has('short_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('short_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.financeBank.fields.short_name_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="swift_code">{{ trans('cruds.financeBank.fields.swift_code') }}</label>
                        <input class="form-control {{ $errors->has('swift_code') ? 'is-invalid' : '' }}" type="text" name="swift_code" id="swift_code" value="{{ old('swift_code', $financeBank->swift_code) }}">
                        @if($errors->has('swift_code'))
                            <div class="invalid-feedback">
                                {{ $errors->first('swift_code') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.financeBank.fields.swift_code_helper') }}</span>
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
