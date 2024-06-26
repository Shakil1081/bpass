@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.party_bills.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.party-bills.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.party_bills.fields.id') }}
                        </th>
                        <td>
                            {{ $partyBill->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.party_bills.fields.created_by') }}
                        </th>
                        <td>
                            {{ $partyBill->createdInfo->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.party_bills.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $partyBill->updatedInfo->name ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.party_bills.fields.supplier_id') }}
                        </th>
                        <td>
                            {{ $partyBill->supplier_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.party_bills.fields.invoice_id') }}
                        </th>
                        <td>
                            {{ $partyBill->invoice_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.party_bills.fields.created_stamp') }}
                        </th>
                        <td>
                            {{ $partyBill->created_stamp }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.party_bills.fields.last_updated_stamp') }}
                        </th>
                        <td>
                            {{ $partyBill->last_updated_stamp }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.party_bills.fields.bill_ref_no') }}
                        </th>
                        <td>
                            {{ $partyBill->bill_ref_no }}
                        </td>
                    </tr>

                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cheques.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
