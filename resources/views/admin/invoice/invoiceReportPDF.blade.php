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
    </style>
</head>
<body>
    <h1>{{ trans('cruds.invoice_report.title_singular') }} {{ trans('global.list') }}</h1>
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
    </table>
</body>
</html>
