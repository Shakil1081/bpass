@extends('layouts.admin')
@section('content')
@can('non_purchase_order_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.non-purchase-orders.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.nonPurchaseOrder.title_singular') }}
            </a>
            <a class="btn btn-success" href="{{ route('admin.non-purchase-orders.entry') }}">
                {{ trans('global.add') }} {{ trans('cruds.non_purchase_order_entry.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'NonPurchaseOrder', 'route' => 'admin.non-purchase-orders.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.nonPurchaseOrder.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-NonPurchaseOrder">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.nonPurchaseOrder.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.nonPurchaseOrder.fields.created_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.nonPurchaseOrder.fields.updated_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.nonPurchaseOrder.fields.actual_payable_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.nonPurchaseOrder.fields.advance_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.nonPurchaseOrder.fields.cell_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.nonPurchaseOrder.fields.amount_in_words') }}
                    </th>
                    <th>
                        {{ trans('cruds.nonPurchaseOrder.fields.credit_limit') }}
                    </th>
                    <th>
                        {{ trans('cruds.nonPurchaseOrder.fields.discount_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.nonPurchaseOrder.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.nonPurchaseOrder.fields.entry_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.nonPurchaseOrder.fields.non_purchase_order_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.nonPurchaseOrder.fields.payment_term') }}
                    </th>
                    <th>
                        {{ trans('cruds.nonPurchaseOrder.fields.reference_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.nonPurchaseOrder.fields.reference_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.nonPurchaseOrder.fields.supplier') }}
                    </th>
                    <th>
                        {{ trans('cruds.nonPurchaseOrder.fields.supplier_address') }}
                    </th>
                    <th>
                        {{ trans('cruds.nonPurchaseOrder.fields.total_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.nonPurchaseOrder.fields.vat_tax') }}
                    </th>
                    <th>
                        {{ trans('cruds.nonPurchaseOrder.fields.organization') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('non_purchase_order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.non-purchase-orders.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.non-purchase-orders.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'created_by', name: 'created_by' },
{ data: 'updated_by', name: 'updated_by' },
{ data: 'actual_payable_amount', name: 'actual_payable_amount' },
{ data: 'advance_amount', name: 'advance_amount' },
{ data: 'cell_no', name: 'cell_no' },
{ data: 'amount_in_words', name: 'amount_in_words' },
{ data: 'credit_limit', name: 'credit_limit' },
{ data: 'discount_amount', name: 'discount_amount' },
{ data: 'email', name: 'email' },
{ data: 'entry_date', name: 'entry_date' },
{ data: 'non_purchase_order_no', name: 'non_purchase_order_no' },
{ data: 'payment_term', name: 'payment_term' },
{ data: 'reference_date', name: 'reference_date' },
{ data: 'reference_no', name: 'reference_no' },
{ data: 'supplier', name: 'supplier' },
{ data: 'supplier_address', name: 'supplier_address' },
{ data: 'total_amount', name: 'total_amount' },
{ data: 'vat_tax', name: 'vat_tax' },
{ data: 'organization_address', name: 'organization.address' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-NonPurchaseOrder').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

});

</script>
@endsection
