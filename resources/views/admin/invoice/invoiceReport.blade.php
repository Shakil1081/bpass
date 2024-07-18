@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-3">
            <a class="btn btn-success" id="pdf_export" href="#">
                Export to PDF
            </a>
            <a class="btn btn-success" id="excel_export" href="#">
                Export to Excel
            </a>
        </div>
        <div class="col-9">
            <form action="{{ route('admin.invoice.report') }}" method="GET" id="filter-form">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <input type="text" class="form-control {{ $errors->has('date_range') ? 'is-invalid' : '' }}" name="date_range" value="{{ request('date_range') }}" style="height: 30px"/>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select class="form-control select2 {{ $errors->has('organization') ? 'is-invalid' : '' }} organization" name="organization" id="organization">
                                <option selected disabled>Select Organization</option>
                                @foreach($organization as $id => $entry)
                                    <option value="{{ $id }}" {{ request('organization') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.invoice_report.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Organization">
                <thead>
                <tr>
                    <th>
                        {{ trans('cruds.invoice_report.fields.unit') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice_report.fields.supplier_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice_report.fields.invoice_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice_report.fields.bill_ref') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice_report.fields.bill_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice_report.fields.payable_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice_report.fields.po_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice_report.fields.po_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice_report.fields.po_date') }}
                    </th>

                    <th>
                        {{ trans('cruds.invoice_report.fields.req_form') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice_report.fields.mpr') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice_report.fields.mpr_rcv_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.invoice_report.fields.cre_period') }}
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($invoices as $invoice)
                    <tr>
                        <td>
                            {{ $invoice->organization->short_name }}
                        </td>
                        <td>
                            {{ $invoice->supplier_id }}
                        </td>
                        <td>
                            {{ $invoice->invoice_no }}
                        </td>
                        <td>
                            {{ $invoice->purchaseOrder->reference_no }}
                        </td>
                        <td>
                            {{ $invoice->invoice_amount }}
                        </td>
                        <td>
                            {{ $invoice->purchaseOrder->actual_payable_amount }}
                        </td>
                        <td>
                            {{ $invoice->purchaseOrder->total_amount }}
                        </td>
                        <td>
                            {{ $invoice->purchaseOrder->purchase_order_no }}
                        </td>
                        <td>
                            {{ $invoice->purchaseOrder->issue_date }}
                        </td>

                        <td>
                            {{ $invoice->purchaseOrder->requisition->department->department_name }}
                        </td>
                        <td>
                            {{ $invoice->purchaseOrder->mpr_no }}
                        </td>
                        <td>
                            {{ $invoice->purchaseOrder->mpr_date }}
                        </td>
                        <td>
                            {{ $invoice->purchaseOrder->credit_limit }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $invoices->links() }}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        jQuery(function($) {
            $('input[name="date_range"]').daterangepicker({
                opens: 'left',
                locale: {
                    format: 'DD/MM/YYYY'
                }
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#pdf_export').on('click', function(e) {
                e.preventDefault();

                const form = $('#filter-form')[0];
                const formData = new FormData(form);
                const params = new URLSearchParams(formData).toString();
                // Decode the URL-encoded string
                const decodedParams = decodeURIComponent(params);
                console.log(decodedParams);

                // Use the decodedParams in your application logic
                const url = `{{ url('admin/invoice/invoice-report/generate-pdf') }}?${decodedParams}`;

                window.location.href = url;
            });

            $('#excel_export').on('click', function(e) {
                e.preventDefault();

                const form = $('#filter-form')[0];
                const formData = new FormData(form);
                const params = new URLSearchParams(formData).toString();
                // Decode the URL-encoded string
                const decodedParams = decodeURIComponent(params);
                console.log(decodedParams);

                // Use the decodedParams in your application logic
                const url = `{{ url('admin/invoice/invoice-report/generate-excel') }}?${decodedParams}`;

                window.location.href = url;
            });
        });
    </script>
@endsection
