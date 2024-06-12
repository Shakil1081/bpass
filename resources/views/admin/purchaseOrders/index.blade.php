@extends('layouts.admin')
@section('content')
@can('purchase_order_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.purchase-orders.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.purchaseOrder.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'PurchaseOrder', 'route' => 'admin.purchase-orders.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.purchaseOrder.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-PurchaseOrder">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.updated_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.actual_payable_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.advance_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.amount_in_words') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.carr_load_up_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.cell_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.credit_limit') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.delivery_days') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.delivery_term') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.discount_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.is_approve') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.issue_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.means_of_transport') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.mpr_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.mpr_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.payment_term') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.payment_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.place_of_delivery') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.place_of_lading') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.purchase_order_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.reference_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.reference_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.supplier_address') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.supplier') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.supplier_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.total_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.vat_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.organization') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.approved_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.is_deleted') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.deleted') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.requisition') }}
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
@can('purchase_order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.purchase-orders.massDestroy') }}",
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
    ajax: "{{ route('admin.purchase-orders.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'updated_by_name', name: 'updated_by.name' },
{ data: 'actual_payable_amount', name: 'actual_payable_amount' },
{ data: 'advance_amount', name: 'advance_amount' },
{ data: 'amount_in_words', name: 'amount_in_words' },
{ data: 'carr_load_up_amount', name: 'carr_load_up_amount' },
{ data: 'cell_no', name: 'cell_no' },
{ data: 'credit_limit', name: 'credit_limit' },
{ data: 'delivery_days', name: 'delivery_days' },
{ data: 'delivery_term', name: 'delivery_term' },
{ data: 'discount_amount', name: 'discount_amount' },
{ data: 'email', name: 'email' },
{ data: 'is_approve', name: 'is_approve' },
{ data: 'issue_date', name: 'issue_date' },
{ data: 'means_of_transport', name: 'means_of_transport' },
{ data: 'mpr_date', name: 'mpr_date' },
{ data: 'mpr_no', name: 'mpr_no' },
{ data: 'payment_term', name: 'payment_term' },
{ data: 'payment_type', name: 'payment_type' },
{ data: 'place_of_delivery', name: 'place_of_delivery' },
{ data: 'place_of_lading', name: 'place_of_lading' },
{ data: 'purchase_order_no', name: 'purchase_order_no' },
{ data: 'reference_date', name: 'reference_date' },
{ data: 'reference_no', name: 'reference_no' },
{ data: 'supplier_address', name: 'supplier_address' },
{ data: 'supplier', name: 'supplier' },
{ data: 'supplier_name', name: 'supplier_name' },
{ data: 'total_amount', name: 'total_amount' },
{ data: 'vat_amount', name: 'vat_amount' },
{ data: 'organization_address', name: 'organization.address' },
{ data: 'approved_by_name', name: 'approved_by.name' },
{ data: 'is_deleted', name: 'is_deleted' },
{ data: 'deleted', name: 'deleted' },
{ data: 'requisition_requisition_date', name: 'requisition.requisition_date' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-PurchaseOrder').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection