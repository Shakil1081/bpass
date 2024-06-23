@extends('layouts.admin')
@section('content')
@can('organization_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.bank-account.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.bank_account.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.bank_account.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Organization">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.bank_account.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.bank_account.fields.created_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.bank_account.fields.updated_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.bank_account.fields.finance_bank_id') }}
                    </th>
                    <th>
                        {{ trans('cruds.bank_account.fields.organization_id') }}
                    </th>
                    <th>
                        {{ trans('cruds.bank_account.fields.created_stamp') }}
                    </th>
                    <th>
                        {{ trans('cruds.bank_account.fields.last_updated_stamp') }}
                    </th>
                    <th>
                        {{ trans('cruds.bank_account.fields.account_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.bank_account.fields.account_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.bank_account.fields.branch_name') }}
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
{{--@can('bank_account_delete')--}}
{{--  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';--}}
{{--  let deleteButton = {--}}
{{--    text: deleteButtonTrans,--}}
{{--    url: "{{ route('admin.bank-account.massDestroy') }}",--}}
{{--    className: 'btn-danger',--}}
{{--    action: function (e, dt, node, config) {--}}
{{--      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {--}}
{{--          return entry.id--}}
{{--      });--}}

{{--      if (ids.length === 0) {--}}
{{--        alert('{{ trans('global.datatables.zero_selected') }}')--}}

{{--        return--}}
{{--      }--}}

{{--      if (confirm('{{ trans('global.areYouSure') }}')) {--}}
{{--        $.ajax({--}}
{{--          headers: {'x-csrf-token': _token},--}}
{{--          method: 'POST',--}}
{{--          url: config.url,--}}
{{--          data: { ids: ids, _method: 'DELETE' }})--}}
{{--          .done(function () { location.reload() })--}}
{{--      }--}}
{{--    }--}}
{{--  }--}}
{{--  dtButtons.push(deleteButton)--}}
{{--@endcan--}}

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.bank-account.index') }}",
    columns: [
        { data: 'placeholder', name: 'placeholder' },
        { data: 'id', name: 'id' },
        { data: 'createdInfo', name: 'createdInfo.name' },
        { data: 'updatedInfo', name: 'updatedInfo.name' },
        { data: 'finance_bank_name', name: 'finance_bank.finance_bank_name' },
        { data: 'organization_name', name: 'organization_info.name' },
        { data: 'created_stamp', name: 'created_stamp' },
        { data: 'last_updated_stamp', name: 'last_updated_stamp' },
        { data: 'account_name', name: 'account_name' },
        { data: 'account_no', name: 'account_no' },
        { data: 'branch_name', name: 'branch_name' },
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
