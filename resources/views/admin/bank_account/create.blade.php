@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.bank_account.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.bank-account.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="created_by">{{ trans('cruds.bank_account.fields.created_by') }}</label>
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
                        <span class="help-block">{{ trans('cruds.bank_account.fields.created_by_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="updated_by_id">{{ trans('cruds.bank_account.fields.updated_by') }}</label>
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
                        <span class="help-block">{{ trans('cruds.bank_account.fields.updated_by_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="updated_by_id">{{ trans('cruds.bank_account.fields.finance_bank_id') }}</label>
                        <select class="form-control select2 {{ $errors->has('finance_bank_id') ? 'is-invalid' : '' }}" name="finance_bank_id" id="finance_bank_id">
                            @foreach($finance_banks as $id => $entry)
                                <option value="{{ $id }}" {{ old('finance_bank_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('finance_bank_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('finance_bank_id') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bank_account.fields.finance_bank_id_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="updated_by_id">{{ trans('cruds.bank_account.fields.organization_id') }}</label>
                        <select class="form-control select2 {{ $errors->has('organization_id') ? 'is-invalid' : '' }}" name="organization_id" id="organization_id">
                            @foreach($organizations as $id => $entry)
                                <option value="{{ $id }}" {{ old('organization_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('organization_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('organization_id') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bank_account.fields.organization_id_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
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

                <div class="col-6">
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
                        <label class="required" for="account_name">{{ trans('cruds.bank_account.fields.account_name') }}</label>
                        <input class="form-control {{ $errors->has('account_name') ? 'is-invalid' : '' }}" type="text" name="account_name" id="account_name" value="{{ old('account_name', '') }}" required>
                        @if($errors->has('account_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('account_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bank_account.fields.account_name_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="account_no">{{ trans('cruds.bank_account.fields.account_no') }}</label>
                        <input class="form-control {{ $errors->has('account_no') ? 'is-invalid' : '' }}" type="text" name="account_no" id="account_no" value="{{ old('account_no', '') }}" required>
                        @if($errors->has('account_no'))
                            <div class="invalid-feedback">
                                {{ $errors->first('account_no') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bank_account.fields.account_no_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="branch_name">{{ trans('cruds.bank_account.fields.branch_name') }}</label>
                        <input class="form-control {{ $errors->has('branch_name') ? 'is-invalid' : '' }}" type="text" name="branch_name" id="branch_name" value="{{ old('branch_name', '') }}" required>
                        @if($errors->has('branch_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('branch_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bank_account.fields.branch_name_helper') }}</span>
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


