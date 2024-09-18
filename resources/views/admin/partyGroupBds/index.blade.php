@extends('layouts.admin')
@section('content')
@can('party_group_bd_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.party-group-bds.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.partyGroupBd.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'PartyGroupBd', 'route' => 'admin.party-group-bds.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.partyGroupBd.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-PartyGroupBd">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.partyGroupBd.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.partyGroupBd.fields.group_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.partyGroupBd.fields.group_name_local') }}
                    </th>
                    <th>
                        {{ trans('cruds.partyGroupBd.fields.office_site_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.partyGroupBd.fields.annual_revenue') }}
                    </th>
                    <th>
                        {{ trans('cruds.partyGroupBd.fields.num_employees') }}
                    </th>
                    <th>
                        {{ trans('cruds.partyGroupBd.fields.ticker_symbol') }}
                    </th>
                    <th>
                        {{ trans('cruds.partyGroupBd.fields.comments') }}
                    </th>
                    <th>
                        {{ trans('cruds.partyGroupBd.fields.logo_image_url') }}
                    </th>
                    <th>
                        {{ trans('cruds.partyGroupBd.fields.last_updated_stamp') }}
                    </th>
                    <th>
                        {{ trans('cruds.partyGroupBd.fields.last_updated_tx_stamp') }}
                    </th>
                    <th>
                        {{ trans('cruds.partyGroupBd.fields.employee_position_type_in_local') }}
                    </th>
                    <th>
                        {{ trans('cruds.partyGroupBd.fields.group_brand_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.partyGroupBd.fields.tin_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.partyGroupBd.fields.vat_reg_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.partyGroupBd.fields.registratn_category') }}
                    </th>
                    <th>
                        {{ trans('cruds.partyGroupBd.fields.bin_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.partyGroupBd.fields.acct_status') }}
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
@can('party_group_bd_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.party-group-bds.massDestroy') }}",
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
    ajax: "{{ route('admin.party-group-bds.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'group_name', name: 'group_name' },
{ data: 'group_name_local', name: 'group_name_local' },
{ data: 'office_site_name', name: 'office_site_name' },
{ data: 'annual_revenue', name: 'annual_revenue' },
{ data: 'num_employees', name: 'num_employees' },
{ data: 'ticker_symbol', name: 'ticker_symbol' },
{ data: 'comments', name: 'comments' },
{ data: 'logo_image_url', name: 'logo_image_url', sortable: false, searchable: false },
{ data: 'last_updated_stamp_name', name: 'last_updated_stamp.name' },
{ data: 'last_updated_tx_stamp', name: 'last_updated_tx_stamp' },
{ data: 'employee_position_type_in_local', name: 'employee_position_type_in_local' },
{ data: 'group_brand_name', name: 'group_brand_name' },
{ data: 'tin_no', name: 'tin_no' },
{ data: 'vat_reg_no', name: 'vat_reg_no' },
{ data: 'registratn_category', name: 'registratn_category' },
{ data: 'bin_no', name: 'bin_no' },
{ data: 'acct_status', name: 'acct_status' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-PartyGroupBd').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

});

</script>
@endsection
