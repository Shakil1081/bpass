@extends('layouts.admin')
@section('content')
@can('organization_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.disbursements.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.disbursements.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.disbursements.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Organization">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.disbursements.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.disbursements.fields.created_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.disbursements.fields.updated_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.disbursements.fields.cheque_id') }}
                    </th>
                    <th>
                        {{ trans('cruds.disbursements.fields.created_stamp') }}
                    </th>
                    <th>
                        {{ trans('cruds.disbursements.fields.last_updated_stamp') }}
                    </th>
                    <th>
                        {{ trans('cruds.disbursements.fields.disbursed_on') }}
                    </th>
                    <th>
                        {{ trans('cruds.disbursements.fields.disbursed_to') }}
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
    ajax: "{{ route('admin.disbursements.index') }}",
    columns: [
        { data: 'placeholder', name: 'placeholder' },
        { data: 'id', name: 'id' },
        { data: 'createdInfo', name: 'createdInfo.name' },
        { data: 'updatedInfo', name: 'updatedInfo.name' },
        { data: 'checkInfo', name: 'checkInfo.cheque_no' },
        { data: 'created_stamp', name: 'created_stamp' },
        { data: 'last_updated_stamp', name: 'last_updated_stamp' },
        { data: 'disbursed_on', name: 'disbursed_on' },
        { data: 'disbursed_to', name: 'disbursed_to' },
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
