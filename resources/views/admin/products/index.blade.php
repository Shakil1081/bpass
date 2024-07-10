@extends('layouts.admin')
@section('content')
@can('organization_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.products.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.products.title_singular') }}
            </a>

            <a class="btn btn-success" href="{{ route('admin.product.editOrderProducts') }}">
                {{ trans('global.edit') }} {{ trans('cruds.products.title_singular') }} By Order
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.products.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Organization">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.products.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.products.fields.created_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.products.fields.updated_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.products.fields.non_purchase_order_id') }}
                    </th>
                    <th>
                        {{ trans('cruds.products.fields.purchase_order_id') }}
                    </th>

                    <th>
                        {{ trans('cruds.products.fields.budget_id') }}
                    </th>
{{--                    <th>--}}
{{--                        {{ trans('cruds.products.fields.budget_details_id') }}--}}
{{--                    </th>--}}
                    <th>
                        {{ trans('cruds.products.fields.created_stamp') }}
                    </th>


                    <th>
                        {{ trans('cruds.products.fields.last_updated_stamp') }}
                    </th>
                    <th>
                        {{ trans('cruds.products.fields.brand') }}
                    </th>
                    <th>
                        {{ trans('cruds.products.fields.goods_receive_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.products.fields.item_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.products.fields.origin') }}
                    </th>
                    <th>
                        {{ trans('cruds.products.fields.quantity') }}
                    </th>
                    <th>
                        {{ trans('cruds.products.fields.serial_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.products.fields.size_or_capacity') }}
                    </th>
                    <th>
                        {{ trans('cruds.products.fields.unit_price') }}
                    </th>
                    <th>
                        {{ trans('cruds.products.fields.uom') }}
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
    ajax: "{{ route('admin.products.index') }}",
    columns: [
        { data: 'placeholder', name: 'placeholder' },
        { data: 'id', name: 'id' },
        { data: 'createdInfo', name: 'createdInfo.name' },
        { data: 'updatedInfo', name: 'updatedInfo.name' },
        { data: 'nonPurchasedInfo', name: 'nonPurchasedInfo.non_purchase_order_no' },
        { data: 'purchasedInfo', name: 'purchasedInfo.purchase_order_no' },
        { data: 'budgetInfo', name: 'budgetInfo.budget_name' },
        // { data: 'budgetDetailsInfo', name: 'budgetDetailsInfo' },
        { data: 'created_stamp', name: 'created_stamp' },
        { data: 'last_updated_stamp', name: 'last_updated_stamp' },
        { data: 'brand', name: 'brand' },
        { data: 'goods_receive_date', name: 'goods_receive_date' },
        { data: 'item_name', name: 'item_name' },
        { data: 'origin', name: 'origin' },
        { data: 'quantity', name: 'quantity' },
        { data: 'serial_no', name: 'serial_no' },
        { data: 'size_or_capacity', name: 'size_or_capacity' },
        { data: 'unit_price', name: 'unit_price' },
        { data: 'uom', name: 'uom' },
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
