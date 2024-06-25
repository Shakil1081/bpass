@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.products.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.products.store") }}">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="created_by">{{ trans('cruds.products.fields.created_by') }}</label>
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
                        <span class="help-block">{{ trans('cruds.products.fields.created_by_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="updated_by_id">{{ trans('cruds.products.fields.updated_by') }}</label>
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
                        <span class="help-block">{{ trans('cruds.products.fields.updated_by_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="non_purchase_order_id">{{ trans('cruds.products.fields.non_purchase_order_id') }}</label>
                        <select class="form-control select2 {{ $errors->has('non_purchase_order_id') ? 'is-invalid' : '' }}" name="non_purchase_order_id" id="non_purchase_order_id" >
                            @foreach($nonPurchaseOrders as $id => $entry)
                                <option value="{{ $id }}" {{ old('non_purchase_order_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('non_purchase_order_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('non_purchase_order_id') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.products.fields.purchase_order_id_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="non_purchase_order_id">{{ trans('cruds.products.fields.purchase_order_id') }}</label>
                        <select class="form-control select2 {{ $errors->has('purchase_order_id') ? 'is-invalid' : '' }}" name="purchase_order_id" id="purchase_order_id" >
                            @foreach($purchaseOrders as $id => $entry)
                                <option value="{{ $id }}" {{ old('purchase_order_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('purchase_order_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('purchase_order_id') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.products.fields.purchase_order_id_helper') }}</span>
                    </div>
                </div>


                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="budget_id">{{ trans('cruds.products.fields.budget_id') }}</label>
                        <select class="form-control select2 {{ $errors->has('budget_id') ? 'is-invalid' : '' }}" name="budget_id" id="budget_id">
                            @foreach($budgets as $id => $entry)
                                <option value="{{ $id }}" {{ old('budget_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('budget_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('budget_id') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.products.fields.budget_id_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="budget_details_id">{{ trans('cruds.products.fields.budget_details_id') }}</label>
                        <select class="form-control select2 {{ $errors->has('budget_details_id') ? 'is-invalid' : '' }}" name="budget_details_id" id="budget_details_id">
                            @foreach($purchaseOrders as $id => $entry)
                                <option value="{{ $id }}" {{ old('budget_details_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('budget_details_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('budget_details_id') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.products.fields.budget_details_id_helper') }}</span>
                    </div>
                </div>




                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="created_stamp">{{ trans('cruds.products.fields.created_stamp') }}</label>
                        <input class="form-control {{ $errors->has('created_stamp') ? 'is-invalid' : '' }}" type="text" name="created_stamp" id="created_stamp" value="{{ old('created_stamp', '') }}" required>
                        @if($errors->has('created_stamp'))
                            <div class="invalid-feedback">
                                {{ $errors->first('created_stamp') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.products.fields.created_stamp_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="last_updated_stamp">{{ trans('cruds.products.fields.last_updated_stamp') }}</label>
                        <input class="form-control {{ $errors->has('last_updated_stamp') ? 'is-invalid' : '' }}" type="text" name="last_updated_stamp" id="last_updated_stamp" value="{{ old('last_updated_stamp', '') }}" required>
                        @if($errors->has('last_updated_stamp'))
                            <div class="invalid-feedback">
                                {{ $errors->first('last_updated_stamp') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.products.fields.last_updated_stamp_helper') }}</span>
                    </div>
                </div>



                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="brand">{{ trans('cruds.products.fields.brand') }}</label>
                        <input class="form-control {{ $errors->has('brand') ? 'is-invalid' : '' }}" type="text" name="brand" id="brand" value="{{ old('brand', '') }}" required>
                        @if($errors->has('brand'))
                            <div class="invalid-feedback">
                                {{ $errors->first('brand') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.products.fields.brand_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="goods_receive_date">{{ trans('cruds.products.fields.goods_receive_date') }}</label>
                        <input class="form-control date {{ $errors->has('goods_receive_date') ? 'is-invalid' : '' }}" type="text" name="goods_receive_date" id="goods_receive_date" value="{{ old('goods_receive_date') }}" required>
                        @if($errors->has('goods_receive_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('goods_receive_date') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.products.fields.goods_receive_date_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="item_name">{{ trans('cruds.products.fields.item_name') }}</label>
                        <input class="form-control {{ $errors->has('item_name') ? 'is-invalid' : '' }}" type="text" name="item_name" id="item_name" value="{{ old('item_name', '') }}" required>
                        @if($errors->has('item_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('item_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.products.fields.item_name_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="origin">{{ trans('cruds.products.fields.origin') }}</label>
                        <input class="form-control {{ $errors->has('origin') ? 'is-invalid' : '' }}" type="text" name="origin" id="origin" value="{{ old('origin', '') }}">
                        @if($errors->has('origin'))
                            <div class="invalid-feedback">
                                {{ $errors->first('origin') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.products.fields.origin_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="quantity">{{ trans('cruds.products.fields.quantity') }}</label>
                        <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="text" name="quantity" id="quantity" value="{{ old('quantity', '') }}" required>
                        @if($errors->has('quantity'))
                            <div class="invalid-feedback">
                                {{ $errors->first('quantity') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.products.fields.quantity_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="serial_no">{{ trans('cruds.products.fields.serial_no') }}</label>
                        <input class="form-control {{ $errors->has('serial_no') ? 'is-invalid' : '' }}" type="text" name="serial_no" id="serial_no" value="{{ old('serial_no', '') }}" required>
                        @if($errors->has('serial_no'))
                            <div class="invalid-feedback">
                                {{ $errors->first('serial_no') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.products.fields.serial_no_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="size_or_capacity">{{ trans('cruds.products.fields.size_or_capacity') }}</label>
                        <input class="form-control {{ $errors->has('size_or_capacity') ? 'is-invalid' : '' }}" type="text" name="size_or_capacity" id="size_or_capacity" value="{{ old('size_or_capacity', '') }}">
                        @if($errors->has('size_or_capacity'))
                            <div class="invalid-feedback">
                                {{ $errors->first('size_or_capacity') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.products.fields.size_or_capacity_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="unit_price">{{ trans('cruds.products.fields.unit_price') }}</label>
                        <input class="form-control {{ $errors->has('unit_price') ? 'is-invalid' : '' }}" type="text" name="unit_price" id="unit_price" value="{{ old('unit_price', '') }}" required>
                        @if($errors->has('unit_price'))
                            <div class="invalid-feedback">
                                {{ $errors->first('unit_price') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.products.fields.unit_price_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="uom">{{ trans('cruds.products.fields.uom') }}</label>
                        <input class="form-control {{ $errors->has('uom') ? 'is-invalid' : '' }}" type="text" name="uom" id="uom" value="{{ old('uom', '') }}">
                        @if($errors->has('uom'))
                            <div class="invalid-feedback">
                                {{ $errors->first('uom') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.products.fields.uom_helper') }}</span>
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


