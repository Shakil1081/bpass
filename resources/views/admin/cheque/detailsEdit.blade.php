@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.cheque_details.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.cheques-details.update",$chequeDetails->id) }}">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label class="required" for="created_by">{{ trans('cruds.cheque_details.fields.created_by') }}</label>
                            <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by" id="created_by" required>
                                @foreach($created_bies as $id => $entry)
                                    <option value="{{ $id }}" {{ $chequeDetails->created_by == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('created_by'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('created_by') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.cheque_details.fields.created_by_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="updated_by_id">{{ trans('cruds.cheque_details.fields.updated_by') }}</label>
                            <select class="form-control select2 {{ $errors->has('updated_by') ? 'is-invalid' : '' }}" name="updated_by" id="updated_by">
                                @foreach($updated_bies as $id => $entry)
                                    <option value="{{ $id }}" {{ $chequeDetails->updated_by == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <label class="required" for="updated_by_id">{{ trans('cruds.cheque_details.fields.cheque_id') }}</label>
                            <select class="form-control select2 {{ $errors->has('cheque_id') ? 'is-invalid' : '' }}" name="cheque_id" id="cheque_id" required>
                                @foreach($cheques as $id => $entry)
                                    <option value="{{ $id }}" {{ $chequeDetails->cheque_id == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('cheque_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cheque_id') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.cheque_details.fields.cheque_id_helper') }}</span>
                        </div>
                    </div>


                    <div class="col-4">
                        <div class="form-group">
                            <label class="required" for="invoice_id">{{ trans('cruds.cheque_details.fields.invoice_id') }}</label>
                            <select class="form-control select2 {{ $errors->has('invoice_id') ? 'is-invalid' : '' }}" name="invoice_id" id="cheque_id">
                                {{--                                @foreach($cheques as $id => $entry)--}}
                                {{--                                    <option value="{{ $id }}" {{ old('cheque_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>--}}
                                {{--                                @endforeach--}}
                            </select>
                            @if($errors->has('invoice_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('invoice_id') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.cheque_details.fields.invoice_id_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label class="required" for="created_stamp">{{ trans('cruds.bank_account.fields.created_stamp') }}</label>
                            <input class="form-control {{ $errors->has('created_stamp') ? 'is-invalid' : '' }}" type="text" name="created_stamp" id="created_stamp" value="{{ $chequeDetails->created_stamp }}" required>
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
                            <input class="form-control {{ $errors->has('last_updated_stamp') ? 'is-invalid' : '' }}" type="text" name="last_updated_stamp" id="last_updated_stamp" value="{{ $chequeDetails->last_updated_stamp }}" required>
                            @if($errors->has('last_updated_stamp'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('last_updated_stamp') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bank_account.fields.last_updated_stamp_helper') }}</span>
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

