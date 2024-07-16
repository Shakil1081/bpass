@extends('layouts.admin')
@section('content')
    @can('organization_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.invoice.report.generate-pdf') }}">
                    Export
                </a>
            </div>
        </div>
    @endcan
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
            </table>
        </div>
    </div>



@endsection
