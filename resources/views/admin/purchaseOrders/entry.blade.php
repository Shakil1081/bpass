@extends('layouts.admin')
@section('content')

    <h4>
        {{ trans('cruds.purchase_order_entry.title_singular') }}
    </h4>
    <form method="POST" action="{{ route('admin.purchase-orders.entryStore') }}">
        @csrf
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="required" for="organization_id">{{ trans('cruds.purchase_order_entry.fields.organization_id') }}</label>
                            <select class="form-control select2 {{ $errors->has('organization_id') ? 'is-invalid' : '' }} organization_id" name="organization_id" id="organization_id" required>
                                @foreach($organization as $id => $entry)
                                    <option value="{{ $id }}" {{ old('organization_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('department_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('department_id') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.organization_id_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="required" for="department_id">{{ trans('cruds.purchase_order_entry.fields.department_id') }}</label>
                            <select class="form-control select2 {{ $errors->has('department_id') ? 'is-invalid' : '' }} department_id" name="department_id" id="department_id" required>
                                <option value="">{{ trans('global.pleaseSelect') }}</option>
                            </select>
                            @if($errors->has('department_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('department_id') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.department_id_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="required" for="reference_date">{{ trans('cruds.purchase_order_entry.fields.mpr_date') }}</label>
                            <input class="form-control date {{ $errors->has('mpr_date') ? 'is-invalid' : '' }}" type="text" name="mpr_date" id="mpr_date" value="{{ old('mpr_date') }}" required>
                            @if($errors->has('mpr_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mpr_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.mpr_date_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="required" for="budget_ref_no">{{ trans('cruds.purchase_order_entry.fields.budget_ref_no') }}</label>
                            <input class="form-control {{ $errors->has('budget_ref_no') ? 'is-invalid' : '' }}" type="text" name="budget_ref_no" id="budget_ref_no" value="{{ old('budget_ref_no') }}" required>
                            @if($errors->has('budget_ref_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('budget_ref_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.budget_ref_no_helper') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                {{ trans('cruds.purchase_order_entry.fields.order_information') }}
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label class="required" for="created_stamp">{{ trans('cruds.purchase_order_entry.fields.purchase_order') }}</label>
                            <input class="form-control {{ $errors->has('purchase_order') ? 'is-invalid' : '' }}" type="text" id="purchase_order" name="purchase_order" value="{{ old('purchase_order', '') }}" readonly>
                            @if($errors->has('purchase_order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('purchase_order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.purchase_order_helper') }}</span>
                        </div>
                    </div>


                    <div class="col-2">
                        @php
                            $today = \Carbon\Carbon::today()->format('d/m/Y');
                        @endphp
                        <div class="form-group">
                            <label class="required" for="purchase_order_date">{{ trans('cruds.purchase_order_entry.fields.purchase_order_date') }}</label>
                            <input class="form-control {{ $errors->has('purchase_order_date') ? 'is-invalid' : '' }}" type="text" name="purchase_order_date" value="{{ $today }}" readonly>
                            @if($errors->has('purchase_order_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('purchase_order_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.purchase_order_date_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-group">
                            <label for="reference_no">{{ trans('cruds.purchase_order_entry.fields.reference_no') }}</label>
                            <input class="form-control {{ $errors->has('reference_no') ? 'is-invalid' : '' }}" type="text" name="reference_no" id="reference_no" value="{{ old('reference_no', '') }}">
                            @if($errors->has('reference_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('reference_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.reference_no_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-group">
                            <label for="reference_date">{{ trans('cruds.purchase_order_entry.fields.reference_date') }}</label>
                            <input class="form-control date {{ $errors->has('reference_date') ? 'is-invalid' : '' }}" type="text" name="reference_date" id="reference_date" value="{{ old('reference_date') }}">
                            @if($errors->has('reference_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('reference_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.reference_date_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-group">
                            <label class="required" for="mpr_no">{{ trans('cruds.purchase_order_entry.fields.mpr_no') }}</label>
                            <input class="form-control {{ $errors->has('mpr_no') ? 'is-invalid' : '' }}" type="text" name="mpr_no" id="mpr_no" value="{{ old('mpr_no', '') }}" required>
                            @if($errors->has('mpr_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mpr_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.mpr_no_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-group">
                            <label class="required" for="mpr_received_date">{{ trans('cruds.purchase_order_entry.fields.mpr_received_date') }}</label>
                            <input class="form-control date {{ $errors->has('mpr_received_date') ? 'is-invalid' : '' }}" type="text" name="mpr_received_date" id="mpr_received_date" value="{{ old('mpr_received_date') }}" required>
                            @if($errors->has('mpr_received_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mpr_received_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.mpr_received_date_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-group">
                            <label for="place_of_loading">{{ trans('cruds.purchase_order_entry.fields.place_of_loading') }}</label>
                            <input class="form-control {{ $errors->has('place_of_loading') ? 'is-invalid' : '' }}" type="text" name="place_of_loading" id="place_of_loading" value="{{ old('place_of_loading', '') }}">
                            @if($errors->has('place_of_loading'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('place_of_loading') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.place_of_loading_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-group">
                            <label for="mode_of_transport">{{ trans('cruds.purchase_order_entry.fields.mode_of_transport') }}</label>
                            <input class="form-control {{ $errors->has('created_stamp') ? 'is-invalid' : '' }}" type="text" name="mode_of_transport" id="mode_of_transport" value="{{ old('mode_of_transport', '') }}">
                            @if($errors->has('mode_of_transport'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mode_of_transport') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.mode_of_transport_helper') }}</span>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                {{ trans('cruds.purchase_order_entry.fields.supplier_information') }}
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label class="required" for="supplier_name">{{ trans('cruds.purchase_order_entry.fields.supplier_name') }}</label>
                            <input class="form-control {{ $errors->has('supplier_name') ? 'is-invalid' : '' }}" type="text" name="supplier_name" id="supplier_name" value="{{ old('supplier_name', '') }}" required>
                            @if($errors->has('supplier_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('supplier_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.supplier_name_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label class="required" for="supplier_cell_no">{{ trans('cruds.purchase_order_entry.fields.supplier_cell_no') }}</label>
                            <input class="form-control {{ $errors->has('supplier_cell_no') ? 'is-invalid' : '' }}" type="text" name="supplier_cell_no" id="supplier_cell_no" value="{{ old('supplier_cell_no', '') }}" required>
                            @if($errors->has('supplier_cell_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('supplier_cell_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.supplier_cell_no_helper') }}</span>
                        </div>
                    </div>


                    <div class="col-4">
                        <div class="form-group">
                            <label for="supplier_email">{{ trans('cruds.purchase_order_entry.fields.supplier_email') }}</label>
                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="supplier_email" id="supplier_email" value="{{ old('supplier_email') }}">
                            @if($errors->has('supplier_email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('supplier_email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.supplier_email_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="required" for="supplier_address">{{ trans('cruds.purchase_order_entry.fields.supplier_address') }}</label>
                            <input class="form-control {{ $errors->has('supplier_address') ? 'is-invalid' : '' }}" type="text" name="supplier_address" id="supplier_address" value="{{ old('supplier_address', '') }}" required>
                            @if($errors->has('supplier_address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('supplier_address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.supplier_address_helper') }}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                {{ trans('cruds.purchase_order_entry.fields.delivery_information') }}
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="delivery_place">{{ trans('cruds.purchase_order_entry.fields.delivery_place') }}</label>
                            <input class="form-control {{ $errors->has('delivery_place') ? 'is-invalid' : '' }}" type="text" name="delivery_place" id="delivery_place" value="{{ old('delivery_place', '') }}">
                            @if($errors->has('delivery_place'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('delivery_place') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.delivery_place_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="required" for="delivery_period">{{ trans('cruds.purchase_order_entry.fields.delivery_period') }}</label>
                            <input class="form-control {{ $errors->has('delivery_place') ? 'is-invalid' : '' }}" type="text" name="delivery_period" id="delivery_period" value="{{ old('delivery_period', '') }}" required>
                            @if($errors->has('delivery_period'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('delivery_period') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.delivery_period_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="delivery_term">{{ trans('cruds.purchase_order_entry.fields.delivery_term') }}</label>
                            <input class="form-control {{ $errors->has('delivery_term') ? 'is-invalid' : '' }}" type="text" name="delivery_term" id="delivery_term" value="{{ old('delivery_term', '') }}">
                            @if($errors->has('delivery_term'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('delivery_term') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.delivery_term_helper') }}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                {{ trans('cruds.purchase_order_entry.fields.payment_information') }}
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="required" for="payment_type">{{ trans('cruds.purchase_order_entry.fields.payment_type') }}</label>
                            <select class="form-control select2 {{ $errors->has('department_id') ? 'is-invalid' : '' }}" name="payment_type" id="payment_type">
                                  @foreach(trans('cruds.purchase_order_entry.dropdowns.payment_type') as $paymentType)
                                     <option value="{{ $paymentType }}" {{ old('payment_type') == $paymentType ? 'selected' : '' }}>{{ $paymentType }}</option>
                                  @endforeach
                            </select>
                            @if($errors->has('payment_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.payment_type_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="required" for="credit_period">{{ trans('cruds.purchase_order_entry.fields.credit_period') }}</label>
                            <input class="form-control {{ $errors->has('credit_period') ? 'is-invalid' : '' }}" type="text" name="credit_period" id="credit_period" value="{{ old('credit_period', '') }}" required>
                            @if($errors->has('credit_period'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('credit_period') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.credit_period_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="payment_term">{{ trans('cruds.purchase_order_entry.fields.payment_term') }}</label>
                            <input class="form-control {{ $errors->has('payment_term') ? 'is-invalid' : '' }}" type="text" name="payment_term" id="payment_term" value="{{ old('payment_term', '') }}">
                            @if($errors->has('payment_term'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_term') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.payment_term_helper') }}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                Add {{ trans('cruds.purchase_order_entry.fields.product_details') }}
            </div>

            <div class="card-body" id="product-rows">
                @if(old('product_details'))
                    @foreach(json_decode(old('product_details'), true) as $index => $product)
                        <div class="row product-row">
                            <!-- Add your form fields here as in the previous example -->
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="required" for="item_name">{{ trans('cruds.purchase_order_entry.fields.item_name') }}</label>
                                    <input class="form-control" type="text" name="item_name[]" value="{{ $product['item_name'] }}" required>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="form-group">
                                    <label for="size_capacity">{{ trans('cruds.purchase_order_entry.fields.size_capacity') }}</label>
                                    <input class="form-control" type="text" name="size_capacity[]" value="{{ $product['size_capacity'] }}">
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="form-group">
                                    <label for="brand">{{ trans('cruds.purchase_order_entry.fields.brand') }}</label>
                                    <input class="form-control" type="text" name="brand[]" value="{{ $product['brand'] }}">
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="form-group">
                                    <label for="origin">{{ trans('cruds.purchase_order_entry.fields.origin') }}</label>
                                    <input class="form-control" type="text" name="origin[]" value="{{ $product['origin'] }}">
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="form-group">
                                    <label class="required" for="quantity">{{ trans('cruds.purchase_order_entry.fields.quantity') }}</label>
                                    <input class="form-control quantity" type="number" name="quantity[]" value="{{ $product['quantity'] }}" required>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="form-group">
                                    <label class="required" for="uom">{{ trans('cruds.purchase_order_entry.fields.uom') }}</label>
                                    <input class="form-control" type="text" name="uom[]" value="{{ $product['uom'] }}" required>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="form-group">
                                    <label class="required" for="unit_price">{{ trans('cruds.purchase_order_entry.fields.unit_price') }}</label>
                                    <input class="form-control unit_price" type="text" name="unit_price[]" value="{{ $product['unit_price'] }}" required>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="form-group">
                                    <label for="total_price">{{ trans('cruds.purchase_order_entry.fields.total_price') }}</label>
                                    <input class="form-control total_price" type="text" name="total_price[]" value="{{ $product['total_price'] }}" disabled>
                                </div>
                            </div>

{{--                            <div class="col-1">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="budget_amount">{{ trans('cruds.purchase_order_entry.fields.budget_amount') }}</label>--}}
{{--                                    <input class="form-control budget_amount" type="text" name="budget_amount[]" value="{{ $product['budget_amount'] }}" disabled>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-1">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="remaining_budget">{{ trans('cruds.purchase_order_entry.fields.remaining_budget') }}</label>--}}
{{--                                    <input class="form-control remaining_budget" type="text" name="remaining_budget[]" value="{{ $product['remaining_budget'] }}" disabled>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="col-1">
                                <button type="button" class="btn btn-success add-row" style="margin: 5px">+</button>
                                <button type="button" class="btn btn-danger remove-row" style="margin: 5px">-</button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="row product-row">
                        <!-- Add your form fields here as in the previous example -->
                        <div class="col-4">
                            <div class="form-group">
                                <label class="required" for="item_name">{{ trans('cruds.purchase_order_entry.fields.item_name') }}</label>
                                <input class="form-control" type="text" name="item_name[]" id="item_name" required>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="size_capacity">{{ trans('cruds.purchase_order_entry.fields.size_capacity') }}</label>
                                <input class="form-control" type="text" name="size_capacity[]" id="size_capacity">
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="brand">{{ trans('cruds.purchase_order_entry.fields.brand') }}</label>
                                <input class="form-control" type="text" name="brand[]" id="brand">
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="origin">{{ trans('cruds.purchase_order_entry.fields.origin') }}</label>
                                <input class="form-control" type="text" name="origin[]" id="origin">
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label class="required" for="quantity">{{ trans('cruds.purchase_order_entry.fields.quantity') }}</label>
                                <input class="form-control quantity" type="number" name="quantity[]" id="quantity" required>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label class="required" for="uom">{{ trans('cruds.purchase_order_entry.fields.uom') }}</label>
                                <input class="form-control" type="text" name="uom[]" id="uom" required>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label class="required" for="unit_price">{{ trans('cruds.purchase_order_entry.fields.unit_price') }}</label>
                                <input class="form-control unit_price" type="text" name="unit_price[]" id="unit_price" required>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="total_price">{{ trans('cruds.purchase_order_entry.fields.total_price') }}</label>
                                <input class="form-control total_price" type="text" name="total_price[]" id="total_price" disabled>
                            </div>
                        </div>

{{--                        <div class="col-1">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="budget_amount">{{ trans('cruds.purchase_order_entry.fields.budget_amount') }}</label>--}}
{{--                                <input class="form-control budget_amount" type="text" name="budget_amount[]" id="budget_amount" disabled>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-1">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="remaining_budget">{{ trans('cruds.purchase_order_entry.fields.remaining_budget') }}</label>--}}
{{--                                <input class="form-control remaining_budget" type="text" name="remaining_budget[]" id="remaining_budget" disabled>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="col-1">
                            <button type="button" class="btn btn-success add-row" style="margin: 5px">+</button>
                            <button type="button" class="btn btn-danger remove-row" style="margin: 5px" disabled>-</button>
                        </div>
                    </div>
                @endif
            </div>
            <input type="hidden" name="product_details" id="product_details">
        </div>

        <div class="card">
            <div class="card-header">
                {{ trans('cruds.purchase_order_entry.fields.payable_information') }}
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label class="required" for="total_amount">{{ trans('cruds.purchase_order_entry.fields.total_amount') }}</label>
                            <input class="form-control {{ $errors->has('total_amount') ? 'is-invalid' : '' }}" type="text" name="total_amount" id="total_amount" readonly>
                            @if($errors->has('total_amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('total_amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.total_amount_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label for="discount_amount">{{ trans('cruds.purchase_order_entry.fields.discount_amount') }}</label>
                            <input class="form-control {{ $errors->has('discount_amount') ? 'is-invalid' : '' }}" type="number" name="discount_amount" id="discount_amount" value="{{ old('discount_amount', '') }}">
                            @if($errors->has('discount_amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('discount_amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.discount_amount_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label for="carrying_loading_uploading_amount">{{ trans('cruds.purchase_order_entry.fields.carrying_loading_uploading_amount') }}</label>
                            <input class="form-control {{ $errors->has('credit_period') ? 'is-invalid' : '' }}" type="number" name="carrying_loading_uploading_amount" id="carrying_loading_uploading_amount" value="{{ old('carrying_loading_uploading_amount', '') }}">
                            @if($errors->has('carrying_loading_uploading_amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('carrying_loading_uploading_amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.carrying_loading_uploading_amount_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label class="required" for="net_payable_amount">{{ trans('cruds.purchase_order_entry.fields.net_payable_amount') }}</label>
                            <input class="form-control {{ $errors->has('net_payable_amount') ? 'is-invalid' : '' }}" type="text" name="net_payable_amount" id="net_payable_amount" readonly>
                            @if($errors->has('net_payable_amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('net_payable_amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.net_payable_amount_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="required" for="in_words">{{ trans('cruds.purchase_order_entry.fields.in_words') }}</label>
                            <input class="form-control {{ $errors->has('in_words') ? 'is-invalid' : '' }}" type="text" name="in_words" id="in_words" value="{{ old('in_words', '') }}" required readonly>
                            @if($errors->has('in_words'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('in_words') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.in_words_helper') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                {{ trans('cruds.purchase_order_entry.fields.budget_information') }}
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="required" for="budget">{{ trans('cruds.purchase_order_entry.fields.budget') }}</label>
                            <input class="form-control budget {{ $errors->has('budget') ? 'is-invalid' : '' }}" type="text" name="budget" id="budget" value="{{ old('budget', '') }}" readonly required>
                            @if($errors->has('budget'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('budget') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.budget_helper') }}</span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="required" for="budget_remaining">{{ trans('cruds.purchase_order_entry.fields.budget_remaining') }}</label>
                            <input class="form-control budget_remaining {{ $errors->has('budget_remaining') ? 'is-invalid' : '' }}" type="text" name="budget_remaining" id="budget_remaining" value="{{ old('budget_remaining', '') }}" readonly required>
                            @if($errors->has('budget_remaining'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('budget_remaining') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.budget_remaining_helper') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Add {{ trans('cruds.purchase_order_entry.fields.terms_and_conditions') }}
                <button type="button" class="btn btn-success btn-sm float-right" id="addTermsButton">Add</button>
            </div>

            <div class="card-body">
                @if(old('terms_and_conditions'))
                    @foreach(old('terms_and_conditions') as $toc)
                        <div class="row" id="termsContainer">
                            <div class="col-12 terms-row">
                                <div class="form-group">
                                    @php
                                        // print_r(old('terms_and_conditions'));
                                        // print_r(session('terms_and_conditions'));
                                        // exit();
                                    @endphp
                                    <label class="required" for="terms_and_conditions">{{ trans('cruds.purchase_order_entry.fields.terms_and_conditions') }}</label>
                                    <div class="input-group">
                                        <input class="form-control {{ $errors->has('terms_and_conditions') ? 'is-invalid' : '' }}" type="text" name="terms_and_conditions[]" value="{{ $toc }}" required>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-danger btn-sm removeTermsButton" disabled>-</button>
                                        </div>
                                    </div>
                                    @if($errors->has('terms_and_conditions'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('terms_and_conditions') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.terms_and_conditions_helper') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="row" id="termsContainer">
                        <div class="col-12 terms-row">
                            <div class="form-group">
                                <label class="required" for="terms_and_conditions">{{ trans('cruds.purchase_order_entry.fields.terms_and_conditions') }}</label>
                                <div class="input-group">
                                    <input class="form-control {{ $errors->has('terms_and_conditions') ? 'is-invalid' : '' }}" type="text" name="terms_and_conditions[]" value="{{ old('terms_and_conditions[]', '') }}" required>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-danger btn-sm removeTermsButton" disabled>-</button>
                                    </div>
                                </div>
                                @if($errors->has('terms_and_conditions'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('terms_and_conditions') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.terms_and_conditions_helper') }}</span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-danger" type="submit">
                {{ trans('global.save') }}
            </button>
        </div>
    </form>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/number-to-words"></script>
@section('scripts')
    <script>
        $(document).ready(function (){
            $('select[name="organization_id"]').on('change',function (){
                var organization_id = $(this).val();
                $('#purchase_order').val('')
                if (organization_id){
                    $.ajax({
                        url: '{{ route("admin.get-requisition-department") }}',
                        type: 'GET',
                        data: { organization_id: organization_id },
                        success:function (data){
                            var d = $('select[name="department_id"]').empty();
                            $.each(data.departments,function (key,value){
                                $('select[name="department_id"]').append('<option value="'+ value.id +'">' + value.department_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var budgetAmount = 0;
            function updateRemoveButtons() {
                $('.remove-row').prop('disabled', $('.product-row').length === 1);
            }

            function calculateTotalPrice(row) {
                var quantity = parseFloat(row.find('input[name="quantity[]"]').val()) || 0;
                var unit_price = parseFloat(row.find('input[name="unit_price[]"]').val()) || 0;
                var total_price = quantity * unit_price;
                row.find('input[name="total_price[]"]').val(total_price.toFixed(2));
            }

            function calculateAndSetTotalAmount(budget_remaining = null) {
                var overallTotalPrice = 0;
                $('.product-row').each(function() {
                    var row = $(this);
                    calculateTotalPrice(row);
                    var total_price = parseFloat(row.find('input[name="total_price[]"]').val()) || 0;
                    overallTotalPrice += total_price;
                });

                var discountAmount = parseFloat($('#discount_amount').val()) || 0;
                var cluAmount = parseFloat($('#carrying_loading_uploading_amount').val()) || 0;

                var finalTotalAmount = overallTotalPrice + cluAmount - discountAmount;

                $('#total_amount').val(overallTotalPrice.toFixed(2));
                $('#in_words').val(numberToWords.toWords(finalTotalAmount.toFixed(2)).toUpperCase());
                $('#net_payable_amount').val(finalTotalAmount.toFixed(2));


                var budgetRemaining = budgetAmount;
                var netPayableAmount = finalTotalAmount;

                console.log('Budget Remaining:', budgetRemaining);
                console.log('Net Payable Amount:', netPayableAmount);

                var updatedBudgetRemaining = budgetRemaining - netPayableAmount;
                if(netPayableAmount > 0){
                    if(updatedBudgetRemaining > netPayableAmount){
                        $('#budget_remaining').val(updatedBudgetRemaining.toFixed(2));
                    }else {
                        alert('Expense Exceeds the Budget')
                    }
                }
            }

            function gatherProductDetails() {
                var productDetails = [];
                $('.product-row').each(function() {
                    var row = $(this);
                    var product = {
                        item_name: row.find('input[name="item_name[]"]').val(),
                        size_capacity: row.find('input[name="size_capacity[]"]').val(),
                        brand: row.find('input[name="brand[]"]').val(),
                        origin: row.find('input[name="origin[]"]').val(),
                        quantity: row.find('input[name="quantity[]"]').val(),
                        uom: row.find('input[name="uom[]"]').val(),
                        unit_price: row.find('input[name="unit_price[]"]').val(),
                        total_price: row.find('input[name="total_price[]"]').val(),
                    };
                    productDetails.push(product);
                });
                $('#product_details').val(JSON.stringify(productDetails));
            }

            $(document).on('click', '.add-row', function() {
                var newRow = $(this).closest('.product-row').clone();
                newRow.find('input').val('');
                newRow.find('input[name="total_price[]"]').prop('disabled', true);
                newRow.appendTo('#product-rows');
                updateRemoveButtons();
            });

            $(document).on('click', '.remove-row', function() {
                if ($('.product-row').length > 1) {
                    $(this).closest('.product-row').remove();
                    updateRemoveButtons();
                    calculateAndSetTotalAmount();
                }
            });

            $(document).on('input', 'input[name="quantity[]"], input[name="unit_price[]"]', function() {
                var row = $(this).closest('.product-row');
                calculateTotalPrice(row);
                calculateAndSetTotalAmount();  // Set total amount whenever an input changes
            });

            $(document).on('input', '#discount_amount, #carrying_loading_uploading_amount', function() {
                calculateAndSetTotalAmount();
            });

            $('form').on('submit', function() {
                gatherProductDetails();
            });

            updateRemoveButtons();
            calculateAndSetTotalAmount();

            $('.department_id').change(function() {
                var departmentId = $(this).val();
                var organization_id = $('#organization_id').val();
                console.log(organization_id)
                if (departmentId) {
                    // Fetch purchase order first
                    $.ajax({
                        url: '{{ route("admin.get-purchase-order") }}',
                        type: 'GET',
                        data: { department_id: departmentId, organization_id: organization_id },
                        success: function(response) {
                            if (response.success) {
                                $('#purchase_order').val(response.purchase_order);
                                // Once purchase order is fetched, fetch budget details
                                $.ajax({
                                    url: '{{ route("admin.get-budget-details") }}',
                                    type: 'GET',
                                    data: { department_id: departmentId },
                                    success: function(response) {
                                        if (response.success) {
                                            budgetAmount = response.budget_data.budget_remaining;
                                            $('.budget').val(response.budget_data.budget_amount);
                                            $('.budget_remaining').val(response.budget_data.budget_remaining);

                                        } else {
                                            // Handle error
                                        }
                                    },
                                    error: function() {
                                        // Handle error
                                    }
                                });
                            } else {
                                // Handle error
                            }
                        },
                        error: function() {
                            // Handle error
                        }
                    });
                } else {
                    // Handle case when departmentId is empty
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            function updateRemoveButtons() {
                if ($('.terms-row').length > 1) {
                    $('.removeTermsButton').prop('disabled', false);
                } else {
                    $('.removeTermsButton').prop('disabled', true);
                }
            }

            $('#addTermsButton').click(function() {
                var newRow = $('.terms-row:first').clone();
                newRow.find('input').val('');
                $('#termsContainer').append(newRow);
                updateRemoveButtons();
            });

            $(document).on('click', '.removeTermsButton', function() {
                if ($('.terms-row').length > 1) {
                    $(this).closest('.terms-row').remove();
                    updateRemoveButtons();
                }
            });

            updateRemoveButtons();
        });
    </script>
@endsection


