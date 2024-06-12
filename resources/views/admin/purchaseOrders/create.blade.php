@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.purchaseOrder.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.purchase-orders.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="updated_by_id">{{ trans('cruds.purchaseOrder.fields.updated_by') }}</label>
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
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.updated_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="actual_payable_amount">{{ trans('cruds.purchaseOrder.fields.actual_payable_amount') }}</label>
                <input class="form-control {{ $errors->has('actual_payable_amount') ? 'is-invalid' : '' }}" type="number" name="actual_payable_amount" id="actual_payable_amount" value="{{ old('actual_payable_amount', '') }}" step="0.01" required>
                @if($errors->has('actual_payable_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('actual_payable_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.actual_payable_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="advance_amount">{{ trans('cruds.purchaseOrder.fields.advance_amount') }}</label>
                <input class="form-control {{ $errors->has('advance_amount') ? 'is-invalid' : '' }}" type="number" name="advance_amount" id="advance_amount" value="{{ old('advance_amount', '') }}" step="0.01">
                @if($errors->has('advance_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('advance_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.advance_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amount_in_words">{{ trans('cruds.purchaseOrder.fields.amount_in_words') }}</label>
                <input class="form-control {{ $errors->has('amount_in_words') ? 'is-invalid' : '' }}" type="text" name="amount_in_words" id="amount_in_words" value="{{ old('amount_in_words', '') }}">
                @if($errors->has('amount_in_words'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount_in_words') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.amount_in_words_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="carr_load_up_amount">{{ trans('cruds.purchaseOrder.fields.carr_load_up_amount') }}</label>
                <input class="form-control {{ $errors->has('carr_load_up_amount') ? 'is-invalid' : '' }}" type="number" name="carr_load_up_amount" id="carr_load_up_amount" value="{{ old('carr_load_up_amount', '') }}" step="0.01">
                @if($errors->has('carr_load_up_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('carr_load_up_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.carr_load_up_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cell_no">{{ trans('cruds.purchaseOrder.fields.cell_no') }}</label>
                <input class="form-control {{ $errors->has('cell_no') ? 'is-invalid' : '' }}" type="text" name="cell_no" id="cell_no" value="{{ old('cell_no', '') }}">
                @if($errors->has('cell_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cell_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.cell_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="credit_limit">{{ trans('cruds.purchaseOrder.fields.credit_limit') }}</label>
                <input class="form-control {{ $errors->has('credit_limit') ? 'is-invalid' : '' }}" type="number" name="credit_limit" id="credit_limit" value="{{ old('credit_limit', '') }}" step="1">
                @if($errors->has('credit_limit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('credit_limit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.credit_limit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="delivery_days">{{ trans('cruds.purchaseOrder.fields.delivery_days') }}</label>
                <input class="form-control {{ $errors->has('delivery_days') ? 'is-invalid' : '' }}" type="text" name="delivery_days" id="delivery_days" value="{{ old('delivery_days', '') }}">
                @if($errors->has('delivery_days'))
                    <div class="invalid-feedback">
                        {{ $errors->first('delivery_days') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.delivery_days_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="delivery_term">{{ trans('cruds.purchaseOrder.fields.delivery_term') }}</label>
                <input class="form-control {{ $errors->has('delivery_term') ? 'is-invalid' : '' }}" type="text" name="delivery_term" id="delivery_term" value="{{ old('delivery_term', '') }}">
                @if($errors->has('delivery_term'))
                    <div class="invalid-feedback">
                        {{ $errors->first('delivery_term') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.delivery_term_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discount_amount">{{ trans('cruds.purchaseOrder.fields.discount_amount') }}</label>
                <input class="form-control {{ $errors->has('discount_amount') ? 'is-invalid' : '' }}" type="number" name="discount_amount" id="discount_amount" value="{{ old('discount_amount', '') }}" step="0.01">
                @if($errors->has('discount_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.discount_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.purchaseOrder.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="is_approve">{{ trans('cruds.purchaseOrder.fields.is_approve') }}</label>
                <input class="form-control {{ $errors->has('is_approve') ? 'is-invalid' : '' }}" type="text" name="is_approve" id="is_approve" value="{{ old('is_approve', 'No') }}" required>
                @if($errors->has('is_approve'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_approve') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.is_approve_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="issue_date">{{ trans('cruds.purchaseOrder.fields.issue_date') }}</label>
                <input class="form-control date {{ $errors->has('issue_date') ? 'is-invalid' : '' }}" type="text" name="issue_date" id="issue_date" value="{{ old('issue_date') }}">
                @if($errors->has('issue_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('issue_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.issue_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="means_of_transport">{{ trans('cruds.purchaseOrder.fields.means_of_transport') }}</label>
                <input class="form-control {{ $errors->has('means_of_transport') ? 'is-invalid' : '' }}" type="text" name="means_of_transport" id="means_of_transport" value="{{ old('means_of_transport', '') }}">
                @if($errors->has('means_of_transport'))
                    <div class="invalid-feedback">
                        {{ $errors->first('means_of_transport') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.means_of_transport_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mpr_date">{{ trans('cruds.purchaseOrder.fields.mpr_date') }}</label>
                <input class="form-control date {{ $errors->has('mpr_date') ? 'is-invalid' : '' }}" type="text" name="mpr_date" id="mpr_date" value="{{ old('mpr_date') }}">
                @if($errors->has('mpr_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mpr_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.mpr_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mpr_no">{{ trans('cruds.purchaseOrder.fields.mpr_no') }}</label>
                <input class="form-control {{ $errors->has('mpr_no') ? 'is-invalid' : '' }}" type="text" name="mpr_no" id="mpr_no" value="{{ old('mpr_no', '') }}">
                @if($errors->has('mpr_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mpr_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.mpr_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_term">{{ trans('cruds.purchaseOrder.fields.payment_term') }}</label>
                <input class="form-control {{ $errors->has('payment_term') ? 'is-invalid' : '' }}" type="text" name="payment_term" id="payment_term" value="{{ old('payment_term', '') }}">
                @if($errors->has('payment_term'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_term') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.payment_term_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_type">{{ trans('cruds.purchaseOrder.fields.payment_type') }}</label>
                <input class="form-control {{ $errors->has('payment_type') ? 'is-invalid' : '' }}" type="text" name="payment_type" id="payment_type" value="{{ old('payment_type', '') }}">
                @if($errors->has('payment_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.payment_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="place_of_delivery">{{ trans('cruds.purchaseOrder.fields.place_of_delivery') }}</label>
                <input class="form-control {{ $errors->has('place_of_delivery') ? 'is-invalid' : '' }}" type="text" name="place_of_delivery" id="place_of_delivery" value="{{ old('place_of_delivery', '') }}">
                @if($errors->has('place_of_delivery'))
                    <div class="invalid-feedback">
                        {{ $errors->first('place_of_delivery') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.place_of_delivery_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="place_of_lading">{{ trans('cruds.purchaseOrder.fields.place_of_lading') }}</label>
                <input class="form-control {{ $errors->has('place_of_lading') ? 'is-invalid' : '' }}" type="text" name="place_of_lading" id="place_of_lading" value="{{ old('place_of_lading', '') }}">
                @if($errors->has('place_of_lading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('place_of_lading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.place_of_lading_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="purchase_order_no">{{ trans('cruds.purchaseOrder.fields.purchase_order_no') }}</label>
                <input class="form-control {{ $errors->has('purchase_order_no') ? 'is-invalid' : '' }}" type="text" name="purchase_order_no" id="purchase_order_no" value="{{ old('purchase_order_no', '') }}">
                @if($errors->has('purchase_order_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('purchase_order_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.purchase_order_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reference_date">{{ trans('cruds.purchaseOrder.fields.reference_date') }}</label>
                <input class="form-control date {{ $errors->has('reference_date') ? 'is-invalid' : '' }}" type="text" name="reference_date" id="reference_date" value="{{ old('reference_date') }}">
                @if($errors->has('reference_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reference_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.reference_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reference_no">{{ trans('cruds.purchaseOrder.fields.reference_no') }}</label>
                <input class="form-control {{ $errors->has('reference_no') ? 'is-invalid' : '' }}" type="text" name="reference_no" id="reference_no" value="{{ old('reference_no', '') }}">
                @if($errors->has('reference_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reference_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.reference_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="supplier_address">{{ trans('cruds.purchaseOrder.fields.supplier_address') }}</label>
                <input class="form-control {{ $errors->has('supplier_address') ? 'is-invalid' : '' }}" type="text" name="supplier_address" id="supplier_address" value="{{ old('supplier_address', '') }}">
                @if($errors->has('supplier_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('supplier_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.supplier_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="supplier">{{ trans('cruds.purchaseOrder.fields.supplier') }}</label>
                <input class="form-control {{ $errors->has('supplier') ? 'is-invalid' : '' }}" type="text" name="supplier" id="supplier" value="{{ old('supplier', '') }}">
                @if($errors->has('supplier'))
                    <div class="invalid-feedback">
                        {{ $errors->first('supplier') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.supplier_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="supplier_name">{{ trans('cruds.purchaseOrder.fields.supplier_name') }}</label>
                <input class="form-control {{ $errors->has('supplier_name') ? 'is-invalid' : '' }}" type="text" name="supplier_name" id="supplier_name" value="{{ old('supplier_name', '') }}">
                @if($errors->has('supplier_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('supplier_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.supplier_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total_amount">{{ trans('cruds.purchaseOrder.fields.total_amount') }}</label>
                <input class="form-control {{ $errors->has('total_amount') ? 'is-invalid' : '' }}" type="number" name="total_amount" id="total_amount" value="{{ old('total_amount', '') }}" step="0.01" required>
                @if($errors->has('total_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.total_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vat_amount">{{ trans('cruds.purchaseOrder.fields.vat_amount') }}</label>
                <input class="form-control {{ $errors->has('vat_amount') ? 'is-invalid' : '' }}" type="number" name="vat_amount" id="vat_amount" value="{{ old('vat_amount', '0') }}" step="0.01">
                @if($errors->has('vat_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vat_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.vat_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="organization_id">{{ trans('cruds.purchaseOrder.fields.organization') }}</label>
                <select class="form-control select2 {{ $errors->has('organization') ? 'is-invalid' : '' }}" name="organization_id" id="organization_id" required>
                    @foreach($organizations as $id => $entry)
                        <option value="{{ $id }}" {{ old('organization_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('organization'))
                    <div class="invalid-feedback">
                        {{ $errors->first('organization') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.organization_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="approved_by_id">{{ trans('cruds.purchaseOrder.fields.approved_by') }}</label>
                <select class="form-control select2 {{ $errors->has('approved_by') ? 'is-invalid' : '' }}" name="approved_by_id" id="approved_by_id">
                    @foreach($approved_bies as $id => $entry)
                        <option value="{{ $id }}" {{ old('approved_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('approved_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('approved_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.approved_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="is_deleted">{{ trans('cruds.purchaseOrder.fields.is_deleted') }}</label>
                <input class="form-control {{ $errors->has('is_deleted') ? 'is-invalid' : '' }}" type="number" name="is_deleted" id="is_deleted" value="{{ old('is_deleted', '0') }}" step="1">
                @if($errors->has('is_deleted'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_deleted') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.is_deleted_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="deleted">{{ trans('cruds.purchaseOrder.fields.deleted') }}</label>
                <input class="form-control date {{ $errors->has('deleted') ? 'is-invalid' : '' }}" type="text" name="deleted" id="deleted" value="{{ old('deleted') }}">
                @if($errors->has('deleted'))
                    <div class="invalid-feedback">
                        {{ $errors->first('deleted') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.deleted_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="requisition_id">{{ trans('cruds.purchaseOrder.fields.requisition') }}</label>
                <select class="form-control select2 {{ $errors->has('requisition') ? 'is-invalid' : '' }}" name="requisition_id" id="requisition_id" required>
                    @foreach($requisitions as $id => $entry)
                        <option value="{{ $id }}" {{ old('requisition_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('requisition'))
                    <div class="invalid-feedback">
                        {{ $errors->first('requisition') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.requisition_helper') }}</span>
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