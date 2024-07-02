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
                            <label class="required" for="created_by">{{ trans('cruds.purchase_order_entry.fields.department_id') }}</label>
                            <select class="form-control select2 {{ $errors->has('department_id') ? 'is-invalid' : '' }}" name="department_id" id="department_id" required>
                                  @foreach($department as $id => $entry)
                                     <option value="{{ $id }}" {{ old('created_by') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                  @endforeach
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
                            <input class="form-control {{ $errors->has('purchase_order') ? 'is-invalid' : '' }}" type="text" name="purchase_order" id="purchase_order" value="{{ old('purchase_order', '') }}" required>
                            @if($errors->has('purchase_order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('purchase_order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.purchase_order_helper') }}</span>
                        </div>
                    </div>


                    <div class="col-2">
                        <div class="form-group">
                            <label class="required" for="purchase_order_date">{{ trans('cruds.purchase_order_entry.fields.purchase_order_date') }}</label>
                            <input class="form-control date {{ $errors->has('purchase_order_date') ? 'is-invalid' : '' }}" type="text" name="purchase_order_date" id="purchase_order_date" value="{{ old('purchase_order_date') }}" required>
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
                                {{--  @foreach($created_bies as $id => $entry)--}}
                                {{--     <option value="{{ $id }}" {{ old('created_by') == $id ? 'selected' : '' }}>{{ $entry }}</option>--}}
                                {{--  @endforeach--}}
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
                <div class="row product-row">
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
                            <input class="form-control" type="number" name="quantity[]" id="quantity" required>
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
                            <input class="form-control" type="text" name="unit_price[]" id="unit_price" required>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label for="total_price">{{ trans('cruds.purchase_order_entry.fields.total_price') }}</label>
                            <input class="form-control" type="text" name="total_price[]" id="total_price" disabled>
                        </div>
                    </div>
                    <div class="col-1">
                        <button type="button" class="btn btn-success add-row" style="margin: 5px">+</button>
                        <button type="button" class="btn btn-danger remove-row" style="margin: 5px" disabled>-</button>
                    </div>
                </div>
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
                            <input class="form-control {{ $errors->has('total_amount') ? 'is-invalid' : '' }}" type="text" name="total_amount" id="total_amount" value="{{ old('total_amount', '') }}" required>
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
                            <input class="form-control {{ $errors->has('discount_amount') ? 'is-invalid' : '' }}" type="text" name="discount_amount" id="discount_amount" value="{{ old('discount_amount', '') }}">
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
                            <input class="form-control {{ $errors->has('credit_period') ? 'is-invalid' : '' }}" type="text" name="carrying_loading_uploading_amount" id="carrying_loading_uploading_amount" value="{{ old('carrying_loading_uploading_amount', '') }}">
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
                            <input class="form-control {{ $errors->has('net_payable_amount') ? 'is-invalid' : '' }}" type="text" name="net_payable_amount" id="net_payable_amount" value="{{ old('net_payable_amount', '') }}" required>
                            @if($errors->has('net_payable_amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('net_payable_amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.net_payable_amount_helper') }}</span>
                        </div>
                    </div>

{{--                    <div class="col-12">--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="required" for="in_words">{{ trans('cruds.purchase_order_entry.fields.in_words') }}</label>--}}
{{--                            <input class="form-control {{ $errors->has('in_words') ? 'is-invalid' : '' }}" type="text" name="in_words" id="in_words" value="{{ old('in_words', '') }}" required>--}}
{{--                            @if($errors->has('in_words'))--}}
{{--                                <div class="invalid-feedback">--}}
{{--                                    {{ $errors->first('in_words') }}--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.in_words_helper') }}</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                Add {{ trans('cruds.purchase_order_entry.fields.terms_and_conditions') }}
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="required" for="terms_and_conditions">{{ trans('cruds.purchase_order_entry.fields.terms_and_conditions') }}</label>
                            <input class="form-control {{ $errors->has('terms_and_conditions') ? 'is-invalid' : '' }}" type="text" name="terms_and_conditions" id="terms_and_conditions" value="{{ old('terms_and_conditions', '') }}" required>
                            @if($errors->has('terms_and_conditions'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('terms_and_conditions') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchase_order_entry.fields.terms_and_conditions_helper') }}</span>
                        </div>
                    </div>
                </div>
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
<script>
    $(document).ready(function() {
        function updateRemoveButtons() {
            $('.remove-row').prop('disabled', $('.product-row').length === 1);
        }

        function calculateTotalPrice(row) {
            var quantity = parseFloat(row.find('#quantity').val()) || 0;
            var unit_price = parseFloat(row.find('#unit_price').val()) || 0;
            var total_price = quantity * unit_price;
            row.find('#total_price').val(total_price.toFixed(2));
        }

        function gatherProductDetails() {
            var productDetails = [];
            $('.product-row').each(function() {
                var row = $(this);
                var product = {
                    item_name: row.find('#item_name').val(),
                    size_capacity: row.find('#size_capacity').val(),
                    brand: row.find('#brand').val(),
                    origin: row.find('#origin').val(),
                    quantity: row.find('#quantity').val(),
                    uom: row.find('#uom').val(),
                    unit_price: row.find('#unit_price').val(),
                    total_price: row.find('#total_price').val()
                };
                productDetails.push(product);
            });
            $('#product_details').val(JSON.stringify(productDetails));
        }

        $(document).on('click', '.add-row', function() {
            var newRow = $(this).closest('.product-row').clone();
            newRow.find('input').val('');
            newRow.find('#total_price').prop('disabled', true);
            newRow.appendTo('#product-rows');
            updateRemoveButtons();
        });

        $(document).on('click', '.remove-row', function() {
            if ($('.product-row').length > 1) {
                $(this).closest('.product-row').remove();
                updateRemoveButtons();
            }
        });

        $(document).on('input', '#quantity, #unit_price', function() {
            var row = $(this).closest('.product-row');
            calculateTotalPrice(row);
        });

        $('form').on('submit', function(e) {
            gatherProductDetails();
        });

        updateRemoveButtons();
    });
</script>
@section('scripts')
@endsection


