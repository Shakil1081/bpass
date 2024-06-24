@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.cheques.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cheques.store") }}">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="created_by">{{ trans('cruds.cheques.fields.created_by') }}</label>
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
                        <span class="help-block">{{ trans('cruds.cheques.fields.created_by_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="updated_by_id">{{ trans('cruds.cheques.fields.updated_by') }}</label>
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
                        <span class="help-block">{{ trans('cruds.cheques.fields.updated_by_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="updated_by_id">{{ trans('cruds.cheques.fields.bank_account_id') }}</label>
                        <select class="form-control select2 {{ $errors->has('bank_account_id') ? 'is-invalid' : '' }}" name="bank_account_id" id="bank_account_id" required>
                            @foreach($bankAccounts as $id => $entry)
                                <option value="{{ $id }}" {{ old('bank_account_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('bank_account_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('bank_account_id') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.cheques.fields.bank_account_id_helper') }}</span>
                    </div>
                </div>



                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="created_stamp">{{ trans('cruds.bank_account.fields.created_stamp') }}</label>
                        <input class="form-control {{ $errors->has('created_stamp') ? 'is-invalid' : '' }}" type="text" name="created_stamp" id="created_stamp" value="{{ old('created_stamp', '') }}" required>
                        @if($errors->has('created_stamp'))
                            <div class="invalid-feedback">
                                {{ $errors->first('created_stamp') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bank_account.fields.created_stamp_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="last_updated_stamp">{{ trans('cruds.bank_account.fields.last_updated_stamp') }}</label>
                        <input class="form-control {{ $errors->has('last_updated_stamp') ? 'is-invalid' : '' }}" type="text" name="last_updated_stamp" id="last_updated_stamp" value="{{ old('last_updated_stamp', '') }}" required>
                        @if($errors->has('last_updated_stamp'))
                            <div class="invalid-feedback">
                                {{ $errors->first('last_updated_stamp') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bank_account.fields.last_updated_stamp_helper') }}</span>
                    </div>
                </div>



                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="cheque_amount">{{ trans('cruds.cheques.fields.cheque_amount') }}</label>
                        <input class="form-control {{ $errors->has('cheque_amount') ? 'is-invalid' : '' }}" type="text" name="cheque_amount" id="cheque_amount" value="{{ old('cheque_amount', '') }}" required>
                        @if($errors->has('cheque_amount'))
                            <div class="invalid-feedback">
                                {{ $errors->first('cheque_amount') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.cheques.fields.cheque_amount_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="cheque_date">{{ trans('cruds.cheques.fields.cheque_date') }}</label>
                        <input class="form-control date {{ $errors->has('cheque_date') ? 'is-invalid' : '' }}" type="text" name="cheque_date" id="cheque_date" value="{{ old('cheque_date') }}" required>
                        @if($errors->has('cheque_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('cheque_date') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.cheques.fields.cheque_date_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="cheque_no">{{ trans('cruds.cheques.fields.cheque_no') }}</label>
                        <input class="form-control {{ $errors->has('cheque_no') ? 'is-invalid' : '' }}" type="text" name="cheque_no" id="cheque_no" value="{{ old('cheque_no', '') }}" required>
                        @if($errors->has('cheque_no'))
                            <div class="invalid-feedback">
                                {{ $errors->first('cheque_no') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.cheques.fields.cheque_no_helper') }}</span>
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


