@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.termCondition.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.term-conditions.update", [$termCondition->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="created_by_id">{{ trans('cruds.termCondition.fields.created_by') }}</label>
                        <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by_id" id="created_by_id" required>
                            @foreach($created_bies as $id => $entry)
                                <option value="{{ $id }}" {{ (old('created_by_id') ? old('created_by_id') : $termCondition->created_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('created_by'))
                            <div class="invalid-feedback">
                                {{ $errors->first('created_by') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.termCondition.fields.created_by_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="updated_by_id">{{ trans('cruds.termCondition.fields.updated_by') }}</label>
                        <select class="form-control select2 {{ $errors->has('updated_by') ? 'is-invalid' : '' }}" name="updated_by_id" id="updated_by_id">
                            @foreach($updated_bies as $id => $entry)
                                <option value="{{ $id }}" {{ (old('updated_by_id') ? old('updated_by_id') : $termCondition->updated_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('updated_by'))
                            <div class="invalid-feedback">
                                {{ $errors->first('updated_by') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.termCondition.fields.updated_by_helper') }}</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="term">{{ trans('cruds.termCondition.fields.term') }}</label>
                        <input class="form-control {{ $errors->has('term') ? 'is-invalid' : '' }}" type="text" name="term" id="term" value="{{ old('term', $termCondition->term) }}">
                        @if($errors->has('term'))
                            <div class="invalid-feedback">
                                {{ $errors->first('term') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.termCondition.fields.term_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="non_purchase_order_id">{{ trans('cruds.termCondition.fields.non_purchase_order') }}</label>
                        <select class="form-control select2 {{ $errors->has('non_purchase_order') ? 'is-invalid' : '' }}" name="non_purchase_order_id" id="non_purchase_order_id" required>
                            @foreach($non_purchase_orders as $id => $entry)
                                <option value="{{ $id }}" {{ (old('non_purchase_order_id') ? old('non_purchase_order_id') : $termCondition->non_purchase_order->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('non_purchase_order'))
                            <div class="invalid-feedback">
                                {{ $errors->first('non_purchase_order') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.termCondition.fields.non_purchase_order_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="purchase_order_id">{{ trans('cruds.termCondition.fields.purchase_order') }}</label>
                        <select class="form-control select2 {{ $errors->has('purchase_order') ? 'is-invalid' : '' }}" name="purchase_order_id" id="purchase_order_id" required>
                            @foreach($purchase_orders as $id => $entry)
                                <option value="{{ $id }}" {{ (old('purchase_order_id') ? old('purchase_order_id') : $termCondition->purchase_order->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('purchase_order'))
                            <div class="invalid-feedback">
                                {{ $errors->first('purchase_order') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.termCondition.fields.purchase_order_helper') }}</span>
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
