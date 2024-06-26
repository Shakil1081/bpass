@extends('layouts.admin')
@section('content')
@can('organization_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.budget-details.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.budget_details.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.budget_details.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Organization">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.budget_details.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget_details.fields.created_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget_details.fields.updated_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget_details.fields.budget_id') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget_details.fields.created_stamp') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget_details.fields.last_updated_stamp') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget_details.fields.budget_item_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget_details.fields.budget_item_ref_id') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget_details.fields.budget_item_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget_details.fields.quantity') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget_details.fields.tolerance') }}
                    </th>
                    <th>
                        {{ trans('cruds.budget_details.fields.unit_price') }}
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.budget-details.index') }}",
    columns: [
        { data: 'placeholder', name: 'placeholder' },
        { data: 'id', name: 'id' },
        { data: 'createdInfo', name: 'createdInfo.name' },
        { data: 'updatedInfo', name: 'updatedInfo.name' },
        { data: 'budgetInfo', name: 'budgetInfo.budget_name' },
        { data: 'created_stamp', name: 'created_stamp' },
        { data: 'last_updated_stamp', name: 'last_updated_stamp' },
        { data: 'budget_item_name', name: 'budget_item_name' },
        { data: 'budget_item_ref_id', name: 'budget_item_ref_id' },
        { data: 'budget_item_type', name: 'budget_item_type' },
        { data: 'quantity', name: 'quantity' },
        { data: 'tolerance', name: 'tolerance' },
        { data: 'unit_price', name: 'unit_price' },
        { data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-Organization').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

});

</script>
@endsection
