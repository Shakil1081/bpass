@extends('layouts.admin')
@section('content')
@can('organization_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.cheques.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.cheques.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.cheques.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Organization">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.cheques.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.cheques.fields.created_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.cheques.fields.updated_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.cheques.fields.bank_account_id') }}
                    </th>
                    <th>
                        {{ trans('cruds.cheques.fields.created_stamp') }}
                    </th>
                    <th>
                        {{ trans('cruds.cheques.fields.last_updated_stamp') }}
                    </th>
                    <th>
                        {{ trans('cruds.cheques.fields.cheque_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.cheques.fields.cheque_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.cheques.fields.cheque_no') }}
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
    ajax: "{{ route('admin.cheques.index') }}",
    columns: [
        { data: 'placeholder', name: 'placeholder' },
        { data: 'id', name: 'id' },
        { data: 'createdInfo', name: 'createdInfo.name' },
        { data: 'updatedInfo', name: 'updatedInfo.name' },
        { data: 'bank_account_id', name: 'bankAccount.account_name' },
        { data: 'created_stamp', name: 'created_stamp' },
        { data: 'last_updated_stamp', name: 'last_updated_stamp' },
        { data: 'cheque_amount', name: 'cheque_amount' },
        { data: 'cheque_date', name: 'cheque_date' },
        { data: 'cheque_no', name: 'cheque_no' },
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
