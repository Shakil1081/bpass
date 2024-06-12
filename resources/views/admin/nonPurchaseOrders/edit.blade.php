@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.nonPurchaseOrder.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.non-purchase-orders.update", [$nonPurchaseOrder->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="created_by_id">{{ trans('cruds.nonPurchaseOrder.fields.created_by') }}</label>
                        <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by_id" id="created_by_id" required>
                            @foreach($created_bies as $id => $entry)
                                <option value="{{ $id }}" {{ (old('created_by_id') ? old('created_by_id') : $nonPurchaseOrder->created_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('created_by'))
                            <div class="invalid-feedback">
                                {{ $errors->first('created_by') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.nonPurchaseOrder.fields.created_by_helper') }}</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="updated_by_id">{{ trans('cruds.nonPurchaseOrder.fields.updated_by') }}</label>
                        <select class="form-control select2 {{ $errors->has('updated_by') ? 'is-invalid' : '' }}" name="updated_by_id" id="updated_by_id">
                            @foreach($updated_bies as $id => $entry)
                                <option value="{{ $id }}" {{ (old('updated_by_id') ? old('updated_by_id') : $nonPurchaseOrder->updated_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('updated_by'))
                            <div class="invalid-feedback">
                                {{ $errors->first('updated_by') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.nonPurchaseOrder.fields.updated_by_helper') }}</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="organization_id">{{ trans('cruds.nonPurchaseOrder.fields.organization') }}</label>
                        <select class="form-control select2 {{ $errors->has('organization') ? 'is-invalid' : '' }}" name="organization_id" id="organization_id" required>
                            @foreach($organizations as $id => $entry)
                                <option value="{{ $id }}" {{ (old('organization_id') ? old('organization_id') : $nonPurchaseOrder->organization->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('organization'))
                            <div class="invalid-feedback">
                                {{ $errors->first('organization') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.nonPurchaseOrder.fields.organization_helper') }}</span>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label class="required" for="actual_payable_amount">{{ trans('cruds.nonPurchaseOrder.fields.actual_payable_amount') }}</label>
                        <input class="form-control {{ $errors->has('actual_payable_amount') ? 'is-invalid' : '' }}" type="number" name="actual_payable_amount" id="actual_payable_amount" value="{{ old('actual_payable_amount', $nonPurchaseOrder->actual_payable_amount) }}" step="0.01" required>
                        @if($errors->has('actual_payable_amount'))
                            <div class="invalid-feedback">
                                {{ $errors->first('actual_payable_amount') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.nonPurchaseOrder.fields.actual_payable_amount_helper') }}</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="vat_tax">{{ trans('cruds.nonPurchaseOrder.fields.vat_tax') }}</label>
                        <input class="form-control {{ $errors->has('vat_tax') ? 'is-invalid' : '' }}" type="text" name="vat_tax" id="vat_tax" value="{{ old('vat_tax', $nonPurchaseOrder->vat_tax) }}">
                        @if($errors->has('vat_tax'))
                            <div class="invalid-feedback">
                                {{ $errors->first('vat_tax') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.nonPurchaseOrder.fields.vat_tax_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="amount_in_words">{{ trans('cruds.nonPurchaseOrder.fields.amount_in_words') }}</label>
                        <input class="form-control {{ $errors->has('amount_in_words') ? 'is-invalid' : '' }}" type="text" name="amount_in_words" id="amount_in_words" value="{{ old('amount_in_words', $nonPurchaseOrder->amount_in_words) }}">
                        @if($errors->has('amount_in_words'))
                            <div class="invalid-feedback">
                                {{ $errors->first('amount_in_words') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.nonPurchaseOrder.fields.amount_in_words_helper') }}</span>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label for="advance_amount">{{ trans('cruds.nonPurchaseOrder.fields.advance_amount') }}</label>
                        <input class="form-control {{ $errors->has('advance_amount') ? 'is-invalid' : '' }}" type="number" name="advance_amount" id="advance_amount" value="{{ old('advance_amount', $nonPurchaseOrder->advance_amount) }}" step="0.01">
                        @if($errors->has('advance_amount'))
                            <div class="invalid-feedback">
                                {{ $errors->first('advance_amount') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.nonPurchaseOrder.fields.advance_amount_helper') }}</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="credit_limit">{{ trans('cruds.nonPurchaseOrder.fields.credit_limit') }}</label>
                        <input class="form-control {{ $errors->has('credit_limit') ? 'is-invalid' : '' }}" type="number" name="credit_limit" id="credit_limit" value="{{ old('credit_limit', $nonPurchaseOrder->credit_limit) }}" step="0.01">
                        @if($errors->has('credit_limit'))
                            <div class="invalid-feedback">
                                {{ $errors->first('credit_limit') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.nonPurchaseOrder.fields.credit_limit_helper') }}</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="discount_amount">{{ trans('cruds.nonPurchaseOrder.fields.discount_amount') }}</label>
                        <input class="form-control {{ $errors->has('discount_amount') ? 'is-invalid' : '' }}" type="number" name="discount_amount" id="discount_amount" value="{{ old('discount_amount', $nonPurchaseOrder->discount_amount) }}" step="0.01">
                        @if($errors->has('discount_amount'))
                            <div class="invalid-feedback">
                                {{ $errors->first('discount_amount') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.nonPurchaseOrder.fields.discount_amount_helper') }}</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="required" for="total_amount">{{ trans('cruds.nonPurchaseOrder.fields.total_amount') }}</label>
                        <input class="form-control {{ $errors->has('total_amount') ? 'is-invalid' : '' }}" type="number" name="total_amount" id="total_amount" value="{{ old('total_amount', $nonPurchaseOrder->total_amount) }}" step="0.01" required>
                        @if($errors->has('total_amount'))
                            <div class="invalid-feedback">
                                {{ $errors->first('total_amount') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.nonPurchaseOrder.fields.total_amount_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="supplier">{{ trans('cruds.nonPurchaseOrder.fields.supplier') }}</label>
                        <input class="form-control {{ $errors->has('supplier') ? 'is-invalid' : '' }}" type="number" name="supplier" id="supplier" value="{{ old('supplier', $nonPurchaseOrder->supplier) }}" step="1">
                        @if($errors->has('supplier'))
                            <div class="invalid-feedback">
                                {{ $errors->first('supplier') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.nonPurchaseOrder.fields.supplier_helper') }}</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="cell_no">{{ trans('cruds.nonPurchaseOrder.fields.cell_no') }}</label>
                        <input class="form-control {{ $errors->has('cell_no') ? 'is-invalid' : '' }}" type="text" name="cell_no" id="cell_no" value="{{ old('cell_no', $nonPurchaseOrder->cell_no) }}">
                        @if($errors->has('cell_no'))
                            <div class="invalid-feedback">
                                {{ $errors->first('cell_no') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.nonPurchaseOrder.fields.cell_no_helper') }}</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="email">{{ trans('cruds.nonPurchaseOrder.fields.email') }}</label>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $nonPurchaseOrder->email) }}" required>
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.nonPurchaseOrder.fields.email_helper') }}</span>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="supplier_address">{{ trans('cruds.nonPurchaseOrder.fields.supplier_address') }}</label>
                        <textarea class="form-control {{ $errors->has('supplier_address') ? 'is-invalid' : '' }}" name="supplier_address" id="supplier_address">{{ old('supplier_address', $nonPurchaseOrder->supplier_address) }}</textarea>
                        @if($errors->has('supplier_address'))
                            <div class="invalid-feedback">
                                {{ $errors->first('supplier_address') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.nonPurchaseOrder.fields.supplier_address_helper') }}</span>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label for="entry_date">{{ trans('cruds.nonPurchaseOrder.fields.entry_date') }}</label>
                        <input class="form-control date {{ $errors->has('entry_date') ? 'is-invalid' : '' }}" type="text" name="entry_date" id="entry_date" value="{{ old('entry_date', $nonPurchaseOrder->entry_date) }}">
                        @if($errors->has('entry_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('entry_date') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.nonPurchaseOrder.fields.entry_date_helper') }}</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="reference_date">{{ trans('cruds.nonPurchaseOrder.fields.reference_date') }}</label>
                        <input class="form-control date {{ $errors->has('reference_date') ? 'is-invalid' : '' }}" type="text" name="reference_date" id="reference_date" value="{{ old('reference_date', $nonPurchaseOrder->reference_date) }}">
                        @if($errors->has('reference_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('reference_date') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.nonPurchaseOrder.fields.reference_date_helper') }}</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="non_purchase_order_no">{{ trans('cruds.nonPurchaseOrder.fields.non_purchase_order_no') }}</label>
                        <input class="form-control {{ $errors->has('non_purchase_order_no') ? 'is-invalid' : '' }}" type="text" name="non_purchase_order_no" id="non_purchase_order_no" value="{{ old('non_purchase_order_no', $nonPurchaseOrder->non_purchase_order_no) }}">
                        @if($errors->has('non_purchase_order_no'))
                            <div class="invalid-feedback">
                                {{ $errors->first('non_purchase_order_no') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.nonPurchaseOrder.fields.non_purchase_order_no_helper') }}</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="reference_no">{{ trans('cruds.nonPurchaseOrder.fields.reference_no') }}</label>
                        <input class="form-control {{ $errors->has('reference_no') ? 'is-invalid' : '' }}" type="text" name="reference_no" id="reference_no" value="{{ old('reference_no', $nonPurchaseOrder->reference_no) }}">
                        @if($errors->has('reference_no'))
                            <div class="invalid-feedback">
                                {{ $errors->first('reference_no') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.nonPurchaseOrder.fields.reference_no_helper') }}</span>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="payment_term">{{ trans('cruds.nonPurchaseOrder.fields.payment_term') }}</label>
                        <input class="form-control {{ $errors->has('payment_term') ? 'is-invalid' : '' }}" type="text" name="payment_term" id="payment_term" value="{{ old('payment_term', $nonPurchaseOrder->payment_term) }}">
                        @if($errors->has('payment_term'))
                            <div class="invalid-feedback">
                                {{ $errors->first('payment_term') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.nonPurchaseOrder.fields.payment_term_helper') }}</span>
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
