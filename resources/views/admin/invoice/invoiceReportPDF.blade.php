<html>
<head>
    <title>{{ trans('cruds.invoice_report.title_singular') }} {{ trans('global.list') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
            color: black;
        }
        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .table tr:hover {
            background-color: #ddd;
        }
        .head-content {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: right;
            font-size: 10px;
            color: gray;
        }
        .page-number:before {
            content: counter(page);
        }
    </style>
</head>
<body>
<div class="head-content">
    <h1>{{ trans('cruds.invoice_report.title_singular') }} {{ trans('global.list') }}</h1>
    <div>
        <b>Date: </b> {{ $dateRange }}.
        <b>Organization: </b> {{ $organizationName }}.
        <b>Number of data: </b> {{ $invoices->count() }}
    </div>
</div>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>{{ trans('cruds.invoice_report.fields.unit') }}</th>
        <th>{{ trans('cruds.invoice_report.fields.supplier_name') }}</th>
        <th>{{ trans('cruds.invoice_report.fields.invoice_no') }}</th>
        <th>{{ trans('cruds.invoice_report.fields.bill_ref') }}</th>
        <th>{{ trans('cruds.invoice_report.fields.bill_amount') }}</th>
        <th>{{ trans('cruds.invoice_report.fields.payable_amount') }}</th>
        <th>{{ trans('cruds.invoice_report.fields.po_amount') }}</th>
        <th>{{ trans('cruds.invoice_report.fields.po_no') }}</th>
        <th>{{ trans('cruds.invoice_report.fields.po_date') }}</th>
        <th>{{ trans('cruds.invoice_report.fields.req_form') }}</th>
        <th>{{ trans('cruds.invoice_report.fields.mpr') }}</th>
        <th>{{ trans('cruds.invoice_report.fields.mpr_rcv_date') }}</th>
        <th>{{ trans('cruds.invoice_report.fields.cre_period') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($invoices as $invoice)
        <tr>
            <td>{{ $invoice->organization->short_name }}</td>
            <td>{{ $invoice->supplier_id }}</td>
            <td>{{ $invoice->invoice_no }}</td>
            <td>{{ $invoice->purchaseOrder->reference_no }}</td>
            <td>{{ $invoice->invoice_amount }}</td>
            <td>{{ $invoice->purchaseOrder->actual_payable_amount }}</td>
            <td>{{ $invoice->purchaseOrder->total_amount }}</td>
            <td>{{ $invoice->purchaseOrder->purchase_order_no }}</td>
            <td>{{ $invoice->purchaseOrder->issue_date }}</td>
            <td>{{ $invoice->purchaseOrder->requisition->department->department_name }}</td>
            <td>{{ $invoice->purchaseOrder->mpr_no }}</td>
            <td>{{ $invoice->purchaseOrder->mpr_date }}</td>
            <td>{{ $invoice->purchaseOrder->credit_limit }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="footer">
    Page <span class="page-number"></span>
</div>

<script type="text/php">
    if (isset($pdf)) {
        $pdf->page_script('
            if ($PAGE_COUNT > 1) {
                $pdf->text(520, 820, "Page $PAGE_NUM of $PAGE_COUNT", null, 10);
            }
        ');
    }
</script>
</body>
</html>
