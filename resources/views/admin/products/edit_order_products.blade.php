@extends('layouts.admin')
@section('content')
    @section('styles')
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    @endsection
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-4">
            <label for="orderId">Order Type:</label>
            <select id="orderType" name="orderType" class="form-control">
                <option value="0">Select One</option>
                <option value="purchase_order">Purchase Order</option>
                <option value="non_purchase_order">Non Purchase Order</option>
            </select>
        </div>
        <div class="col-lg-4">
            <label for="orderId">Order ID:</label>
            <input id="orderId" name="orderId" class="form-control" disabled>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.products.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <form id="productsForm" method="POST" action="{{ route('admin.order-products.update') }}">
                @csrf
                <input type="hidden" name="order_id" id="hiddenOrderId">
                <table class="table table-bordered table-striped table-hover ajaxTable datatable datatable-Organization">
                    <thead>
                    <tr>
                        <th width="10"></th>
                        <th>{{ trans('cruds.products.fields.id') }}</th>
                        <th>{{ trans('cruds.products.fields.brand') }}</th>
                        <th>{{ trans('cruds.products.fields.goods_receive_date') }}</th>
                        <th>{{ trans('cruds.products.fields.item_name') }}</th>
                        <th>{{ trans('cruds.products.fields.origin') }}</th>
                        <th>{{ trans('cruds.products.fields.quantity') }}</th>
                        <th>{{ trans('cruds.products.fields.serial_no') }}</th>
                        <th>{{ trans('cruds.products.fields.size_or_capacity') }}</th>
                        <th>{{ trans('cruds.products.fields.unit_price') }}</th>
                        <th>{{ trans('cruds.products.fields.uom') }}</th>
                    </tr>
                    </thead>
                    <tbody id="productsTableBody">

                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>


@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>

    <script>
        $(function() {
            // Function to initialize autocomplete for order ID input
            $("#orderId").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('admin.fetch.order.ids') }}",
                        dataType: "json",
                        type: 'GET',
                        data: {
                            orderId: request.term,
                            orderType: $("#orderType").val()
                        },
                        success: function(data) {
                            response(data);
                        },
                        error: function() {
                            response([]);
                        }
                    });
                },
                minLength: 6,
                select: function(event, ui) {
                    $("#orderId").val(ui.item.label);
                    var selectedOrderId = ui.item.value;
                    $("#hiddenOrderId").val(selectedOrderId);
                    console.log("Selected Order ID: " + selectedOrderId);

                    var fetchProductsUrl = "{{ url('admin/fetch-products') }}" + "/" + selectedOrderId;
                    $.ajax({
                        url: fetchProductsUrl,
                        dataType: "json",
                        type: 'GET',
                        success: function(products) {
                            console.log("Products for order ID " + selectedOrderId + ":", products);
                            populateProductsTable(products);
                        },
                        error: function() {
                            console.error("Failed to fetch products for order ID " + selectedOrderId);
                        }
                    });

                    return false; // Prevent default action
                }
            });

            $("#orderType").change(function() {
                var selectedValue = $(this).val();
                if (selectedValue !== "0") {
                    $("#orderId").prop("disabled", false);
                } else {
                    $("#orderId").prop("disabled", true).val(""); // Disable and clear input
                }
            });

            // Submit form event handler
            $("#productsForm").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.status === 'success') {
                            window.location.href = response.redirect_url;
                        }
                    },
                    error: function(response) {
                        var errors = response.responseJSON.errors;
                        showValidationErrors(errors);
                    }
                });
            });
        });

        // Function to populate products table
        function populateProductsTable(products) {
            var tbody = $("#productsTableBody");
            tbody.empty();  // Clear existing rows

            products.forEach(function(product) {
                var row = "<tr>" +
                    "<td></td>" +
                    "<td><input type='text' class='form-control' value='" + product.id + "' readonly><span class='text-danger' data-error='products[" + product.id + "][id]'></span></td>" +
                    "<td><input type='text' class='form-control' value='" + product.brand + "' readonly></td>" +
                    "<td><input type='text' class='form-control' value='" + product.goods_receive_date + "' readonly></td>" +
                    "<td><input type='text' class='form-control' value='" + product.item_name + "' readonly></td>" +
                    "<td><input type='text' class='form-control' value='" + product.origin + "' readonly></td>" +
                    "<td><input type='text' class='form-control' name='products[" + product.id + "][quantity]' value='" + product.quantity + "'><span class='text-danger' data-error='products[" + product.id + "][quantity]'></span></td>" +
                    "<td><input type='text' class='form-control' name='products[" + product.id + "][serial_no]' value='" + product.serial_no + "'><span class='text-danger' data-error='products[" + product.id + "][serial_no]'></span></td>" +
                    "<td><input type='text' class='form-control' value='" + product.size_or_capacity + "' readonly></td>" +
                    "<td><input type='text' class='form-control' name='products[" + product.id + "][unit_price]' value='" + product.unit_price + "'><span class='text-danger' data-error='products[" + product.id + "][unit_price]'></span></td>" +
                    "<td><input type='text' class='form-control' value='" + product.uom + "' readonly></td>" +
                    "</tr>";
                tbody.append(row);
            });
        }

        // Function to display validation errors
        function showValidationErrors(errors) {
            $(".text-danger").text("");  // Clear existing error messages

            $.each(errors, function(key, messages) {
                var errorSpan = $("span[data-error='" + key + "']");
                errorSpan.text(messages.join(", "));
            });
        }

    </script>
@endsection
