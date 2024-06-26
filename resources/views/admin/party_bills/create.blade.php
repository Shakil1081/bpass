@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.party_bills.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.party-bills.store") }}">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="created_by">{{ trans('cruds.party_bills.fields.created_by') }}</label>
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
                        <span class="help-block">{{ trans('cruds.party_bills.fields.created_by_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="updated_by">{{ trans('cruds.party_bills.fields.updated_by') }}</label>
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
                        <span class="help-block">{{ trans('cruds.party_bills.fields.updated_by_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="supplier_id">{{ trans('cruds.party_bills.fields.supplier_id') }}</label>
                        <select class="form-control select2 {{ $errors->has('supplier_id') ? 'is-invalid' : '' }}" name="supplier_id" id="supplier_id">
{{--                            @foreach($updated_bies as $id => $entry)--}}
{{--                                <option value="{{ $id }}" {{ old('supplier_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>--}}
{{--                            @endforeach--}}
                        </select>
                        @if($errors->has('supplier_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('supplier_id') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.party_bills.fields.supplier_id_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="invoice_id">{{ trans('cruds.party_bills.fields.invoice_id') }}</label>
                        <select class="form-control select2 {{ $errors->has('invoice_id') ? 'is-invalid' : '' }}" name="invoice_id" id="invoice_id">
                            {{--                            @foreach($updated_bies as $id => $entry)--}}
                            {{--                                <option value="{{ $id }}" {{ old('supplier_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>--}}
                            {{--                            @endforeach--}}
                        </select>
                        @if($errors->has('invoice_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('invoice_id') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.party_bills.fields.invoice_id_helper') }}</span>
                    </div>
                </div>


                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="created_stamp">{{ trans('cruds.party_bills.fields.created_stamp') }}</label>
                        <input class="form-control {{ $errors->has('created_stamp') ? 'is-invalid' : '' }}" type="text" name="created_stamp" id="created_stamp" value="{{ old('created_stamp', '') }}" required>
                        @if($errors->has('created_stamp'))
                            <div class="invalid-feedback">
                                {{ $errors->first('created_stamp') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.party_bills.fields.created_stamp_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="last_updated_stamp">{{ trans('cruds.party_bills.fields.last_updated_stamp') }}</label>
                        <input class="form-control {{ $errors->has('last_updated_stamp') ? 'is-invalid' : '' }}" type="text" name="last_updated_stamp" id="last_updated_stamp" value="{{ old('last_updated_stamp', '') }}" required>
                        @if($errors->has('last_updated_stamp'))
                            <div class="invalid-feedback">
                                {{ $errors->first('last_updated_stamp') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.party_bills.fields.last_updated_stamp_helper') }}</span>
                    </div>
                </div>



                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="bill_ref_no">{{ trans('cruds.party_bills.fields.bill_ref_no') }}</label>
                        <input class="form-control {{ $errors->has('bill_ref_no') ? 'is-invalid' : '' }}" type="text" name="bill_ref_no" id="bill_ref_no" value="{{ old('bill_ref_no', '') }}" required>
                        @if($errors->has('bill_ref_no'))
                            <div class="invalid-feedback">
                                {{ $errors->first('bill_ref_no') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.party_bills.fields.bill_ref_no_helper') }}</span>
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


