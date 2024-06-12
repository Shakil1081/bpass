@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.partyGroupBd.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.party-group-bds.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.partyGroupBd.fields.id') }}
                        </th>
                        <td>
                            {{ $partyGroupBd->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partyGroupBd.fields.group_name') }}
                        </th>
                        <td>
                            {{ $partyGroupBd->group_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partyGroupBd.fields.group_name_local') }}
                        </th>
                        <td>
                            {{ $partyGroupBd->group_name_local }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partyGroupBd.fields.office_site_name') }}
                        </th>
                        <td>
                            {{ $partyGroupBd->office_site_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partyGroupBd.fields.annual_revenue') }}
                        </th>
                        <td>
                            {{ $partyGroupBd->annual_revenue }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partyGroupBd.fields.num_employees') }}
                        </th>
                        <td>
                            {{ $partyGroupBd->num_employees }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partyGroupBd.fields.ticker_symbol') }}
                        </th>
                        <td>
                            {{ $partyGroupBd->ticker_symbol }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partyGroupBd.fields.comments') }}
                        </th>
                        <td>
                            {{ $partyGroupBd->comments }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partyGroupBd.fields.logo_image_url') }}
                        </th>
                        <td>
                            @if($partyGroupBd->logo_image_url)
                                <a href="{{ $partyGroupBd->logo_image_url->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $partyGroupBd->logo_image_url->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partyGroupBd.fields.last_updated_stamp') }}
                        </th>
                        <td>
                            {{ $partyGroupBd->last_updated_stamp->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partyGroupBd.fields.last_updated_tx_stamp') }}
                        </th>
                        <td>
                            {{ $partyGroupBd->last_updated_tx_stamp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partyGroupBd.fields.employee_position_type_in_local') }}
                        </th>
                        <td>
                            {{ $partyGroupBd->employee_position_type_in_local }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partyGroupBd.fields.group_brand_name') }}
                        </th>
                        <td>
                            {{ $partyGroupBd->group_brand_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partyGroupBd.fields.tin_no') }}
                        </th>
                        <td>
                            {{ $partyGroupBd->tin_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partyGroupBd.fields.vat_reg_no') }}
                        </th>
                        <td>
                            {{ $partyGroupBd->vat_reg_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partyGroupBd.fields.registratn_category') }}
                        </th>
                        <td>
                            {{ $partyGroupBd->registratn_category }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partyGroupBd.fields.bin_no') }}
                        </th>
                        <td>
                            {{ $partyGroupBd->bin_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partyGroupBd.fields.acct_status') }}
                        </th>
                        <td>
                            {{ $partyGroupBd->acct_status }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.party-group-bds.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection