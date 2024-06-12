@extends('layouts.admin')
@section('content')
@can('budget_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.budgets.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.budget.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Budget', 'route' => 'admin.budgets.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.budget.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Budget">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.budget.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget.fields.created_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget.fields.updated_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget.fields.budget_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget.fields.budget_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget.fields.budget_for') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget.fields.budget_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget.fields.budget_reference') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget.fields.close_reason') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget.fields.expense_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget.fields.is_closed') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget.fields.purpose') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget.fields.remarks') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget.fields.valid_up_to') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget.fields.assign_user') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget.fields.department') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget.fields.organization') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget.fields.proposed_by') }}
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
@can('budget_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.budgets.massDestroy') }}",
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
    ajax: "{{ route('admin.budgets.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'created_by_name', name: 'created_by.name' },
{ data: 'updated_by_name', name: 'updated_by.name' },
{ data: 'budget_amount', name: 'budget_amount' },
{ data: 'budget_date', name: 'budget_date' },
{ data: 'budget_for', name: 'budget_for' },
{ data: 'budget_name', name: 'budget_name' },
{ data: 'budget_reference', name: 'budget_reference' },
{ data: 'close_reason', name: 'close_reason' },
{ data: 'expense_type', name: 'expense_type' },
{ data: 'is_closed', name: 'is_closed' },
{ data: 'purpose', name: 'purpose' },
{ data: 'remarks', name: 'remarks' },
{ data: 'valid_up_to', name: 'valid_up_to' },
{ data: 'assign_user_name', name: 'assign_user.name' },
{ data: 'department_department_name', name: 'department.department_name' },
{ data: 'organization_address', name: 'organization.address' },
{ data: 'proposed_by_name', name: 'proposed_by.name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-Budget').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection