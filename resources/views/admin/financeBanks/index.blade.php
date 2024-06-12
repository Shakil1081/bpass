@extends('layouts.admin')
@section('content')
@can('finance_bank_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.finance-banks.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.financeBank.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'FinanceBank', 'route' => 'admin.finance-banks.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.financeBank.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-FinanceBank">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.financeBank.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.financeBank.fields.created_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.financeBank.fields.updated_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.financeBank.fields.finance_bank_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.financeBank.fields.routing_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.financeBank.fields.short_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.financeBank.fields.swift_code') }}
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
@can('finance_bank_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.finance-banks.massDestroy') }}",
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
    ajax: "{{ route('admin.finance-banks.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'created_by_name', name: 'created_by.name' },
{ data: 'updated_by', name: 'updated_by' },
{ data: 'finance_bank_name', name: 'finance_bank_name' },
{ data: 'routing_number', name: 'routing_number' },
{ data: 'short_name', name: 'short_name' },
{ data: 'swift_code', name: 'swift_code' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-FinanceBank').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection