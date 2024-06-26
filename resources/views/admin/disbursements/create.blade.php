@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.disbursements.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.disbursements.store") }}">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="created_by">{{ trans('cruds.disbursements.fields.created_by') }}</label>
                        <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by" id="created_by" required>
                            @foreach($created_bies as $id => $entry)
                                <option value="{{ $id }}" {{ old('created_by') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('created_by'))
                            <div class="invalid-feedback">
                                {{ $errors->first('created_by') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.disbursements.fields.created_by_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="updated_by">{{ trans('cruds.disbursements.fields.updated_by') }}</label>
                        <select class="form-control select2 {{ $errors->has('updated_by') ? 'is-invalid' : '' }}" name="updated_by" id="updated_by">
                            @foreach($updated_bies as $id => $entry)
                                <option value="{{ $id }}" {{ old('updated_by') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('updated_by'))
                            <div class="invalid-feedback">
                                {{ $errors->first('updated_by') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.disbursements.fields.updated_by_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="cheque_id">{{ trans('cruds.disbursements.fields.cheque_id') }}</label>
                        <select class="form-control select2 {{ $errors->has('cheque_id') ? 'is-invalid' : '' }}" name="cheque_id" id="cheque_id" required>
                            @foreach($cheques as $id => $entry)
                                <option value="{{ $id }}" {{ old('cheque_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('cheque_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('cheque_id') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.disbursements.fields.cheque_id_helper') }}</span>
                    </div>
                </div>



                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="created_stamp">{{ trans('cruds.disbursements.fields.created_stamp') }}</label>
                        <input class="form-control {{ $errors->has('created_stamp') ? 'is-invalid' : '' }}" type="text" name="created_stamp" id="created_stamp" value="{{ old('created_stamp', '') }}" required>
                        @if($errors->has('created_stamp'))
                            <div class="invalid-feedback">
                                {{ $errors->first('created_stamp') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.disbursements.fields.created_stamp_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="last_updated_stamp">{{ trans('cruds.disbursements.fields.last_updated_stamp') }}</label>
                        <input class="form-control {{ $errors->has('last_updated_stamp') ? 'is-invalid' : '' }}" type="text" name="last_updated_stamp" id="last_updated_stamp" value="{{ old('last_updated_stamp', '') }}" required>
                        @if($errors->has('last_updated_stamp'))
                            <div class="invalid-feedback">
                                {{ $errors->first('last_updated_stamp') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.disbursements.fields.last_updated_stamp_helper') }}</span>
                    </div>
                </div>



                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="disbursed_on">{{ trans('cruds.disbursements.fields.disbursed_on') }}</label>
                        <input class="form-control date {{ $errors->has('disbursed_on') ? 'is-invalid' : '' }}" type="text" name="disbursed_on" id="disbursed_on" value="{{ old('disbursed_on') }}" required>
                        @if($errors->has('disbursed_on'))
                            <div class="invalid-feedback">
                                {{ $errors->first('disbursed_on') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.disbursements.fields.disbursed_on_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="disbursed_to">{{ trans('cruds.disbursements.fields.disbursed_to') }}</label>
                        <input class="form-control {{ $errors->has('disbursed_to') ? 'is-invalid' : '' }}" type="text" name="disbursed_to" id="disbursed_to" value="{{ old('disbursed_to', '') }}" required>
                        @if($errors->has('disbursed_to'))
                            <div class="invalid-feedback">
                                {{ $errors->first('disbursed_to') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.disbursements.fields.disbursed_to_helper') }}</span>
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


