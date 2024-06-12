@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.partyGroupBd.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.party-group-bds.update", [$partyGroupBd->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="group_name">{{ trans('cruds.partyGroupBd.fields.group_name') }}</label>
                        <input class="form-control {{ $errors->has('group_name') ? 'is-invalid' : '' }}" type="text" name="group_name" id="group_name" value="{{ old('group_name', $partyGroupBd->group_name) }}" required>
                        @if($errors->has('group_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('group_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.partyGroupBd.fields.group_name_helper') }}</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="group_name_local">{{ trans('cruds.partyGroupBd.fields.group_name_local') }}</label>
                        <input class="form-control {{ $errors->has('group_name_local') ? 'is-invalid' : '' }}" type="text" name="group_name_local" id="group_name_local" value="{{ old('group_name_local', $partyGroupBd->group_name_local) }}">
                        @if($errors->has('group_name_local'))
                            <div class="invalid-feedback">
                                {{ $errors->first('group_name_local') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.partyGroupBd.fields.group_name_local_helper') }}</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="office_site_name">{{ trans('cruds.partyGroupBd.fields.office_site_name') }}</label>
                        <input class="form-control {{ $errors->has('office_site_name') ? 'is-invalid' : '' }}" type="text" name="office_site_name" id="office_site_name" value="{{ old('office_site_name', $partyGroupBd->office_site_name) }}" required>
                        @if($errors->has('office_site_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('office_site_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.partyGroupBd.fields.office_site_name_helper') }}</span>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label for="annual_revenue">{{ trans('cruds.partyGroupBd.fields.annual_revenue') }}</label>
                        <input class="form-control {{ $errors->has('annual_revenue') ? 'is-invalid' : '' }}" type="number" name="annual_revenue" id="annual_revenue" value="{{ old('annual_revenue', $partyGroupBd->annual_revenue) }}" step="0.01">
                        @if($errors->has('annual_revenue'))
                            <div class="invalid-feedback">
                                {{ $errors->first('annual_revenue') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.partyGroupBd.fields.annual_revenue_helper') }}</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="required" for="num_employees">{{ trans('cruds.partyGroupBd.fields.num_employees') }}</label>
                        <input class="form-control {{ $errors->has('num_employees') ? 'is-invalid' : '' }}" type="number" name="num_employees" id="num_employees" value="{{ old('num_employees', $partyGroupBd->num_employees) }}" step="1" required>
                        @if($errors->has('num_employees'))
                            <div class="invalid-feedback">
                                {{ $errors->first('num_employees') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.partyGroupBd.fields.num_employees_helper') }}</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="ticker_symbol">{{ trans('cruds.partyGroupBd.fields.ticker_symbol') }}</label>
                        <input class="form-control {{ $errors->has('ticker_symbol') ? 'is-invalid' : '' }}" type="text" name="ticker_symbol" id="ticker_symbol" value="{{ old('ticker_symbol', $partyGroupBd->ticker_symbol) }}">
                        @if($errors->has('ticker_symbol'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ticker_symbol') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.partyGroupBd.fields.ticker_symbol_helper') }}</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="comments">{{ trans('cruds.partyGroupBd.fields.comments') }}</label>
                        <input class="form-control {{ $errors->has('comments') ? 'is-invalid' : '' }}" type="text" name="comments" id="comments" value="{{ old('comments', $partyGroupBd->comments) }}">
                        @if($errors->has('comments'))
                            <div class="invalid-feedback">
                                {{ $errors->first('comments') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.partyGroupBd.fields.comments_helper') }}</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="last_updated_stamp_id">{{ trans('cruds.partyGroupBd.fields.last_updated_stamp') }}</label>
                        <select class="form-control select2 {{ $errors->has('last_updated_stamp') ? 'is-invalid' : '' }}" name="last_updated_stamp_id" id="last_updated_stamp_id">
                            @foreach($last_updated_stamps as $id => $entry)
                                <option value="{{ $id }}" {{ (old('last_updated_stamp_id') ? old('last_updated_stamp_id') : $partyGroupBd->last_updated_stamp->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('last_updated_stamp'))
                            <div class="invalid-feedback">
                                {{ $errors->first('last_updated_stamp') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.partyGroupBd.fields.last_updated_stamp_helper') }}</span>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label for="last_updated_tx_stamp">{{ trans('cruds.partyGroupBd.fields.last_updated_tx_stamp') }}</label>
                        <input class="form-control {{ $errors->has('last_updated_tx_stamp') ? 'is-invalid' : '' }}" type="text" name="last_updated_tx_stamp" id="last_updated_tx_stamp" value="{{ old('last_updated_tx_stamp', $partyGroupBd->last_updated_tx_stamp) }}">
                        @if($errors->has('last_updated_tx_stamp'))
                            <div class="invalid-feedback">
                                {{ $errors->first('last_updated_tx_stamp') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.partyGroupBd.fields.last_updated_tx_stamp_helper') }}</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="employee_position_type_in_local">{{ trans('cruds.partyGroupBd.fields.employee_position_type_in_local') }}</label>
                        <input class="form-control {{ $errors->has('employee_position_type_in_local') ? 'is-invalid' : '' }}" type="text" name="employee_position_type_in_local" id="employee_position_type_in_local" value="{{ old('employee_position_type_in_local', $partyGroupBd->employee_position_type_in_local) }}">
                        @if($errors->has('employee_position_type_in_local'))
                            <div class="invalid-feedback">
                                {{ $errors->first('employee_position_type_in_local') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.partyGroupBd.fields.employee_position_type_in_local_helper') }}</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="group_brand_name">{{ trans('cruds.partyGroupBd.fields.group_brand_name') }}</label>
                        <input class="form-control {{ $errors->has('group_brand_name') ? 'is-invalid' : '' }}" type="text" name="group_brand_name" id="group_brand_name" value="{{ old('group_brand_name', $partyGroupBd->group_brand_name) }}">
                        @if($errors->has('group_brand_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('group_brand_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.partyGroupBd.fields.group_brand_name_helper') }}</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="required" for="tin_no">{{ trans('cruds.partyGroupBd.fields.tin_no') }}</label>
                        <input class="form-control {{ $errors->has('tin_no') ? 'is-invalid' : '' }}" type="text" name="tin_no" id="tin_no" value="{{ old('tin_no', $partyGroupBd->tin_no) }}" required>
                        @if($errors->has('tin_no'))
                            <div class="invalid-feedback">
                                {{ $errors->first('tin_no') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.partyGroupBd.fields.tin_no_helper') }}</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="vat_reg_no">{{ trans('cruds.partyGroupBd.fields.vat_reg_no') }}</label>
                        <input class="form-control {{ $errors->has('vat_reg_no') ? 'is-invalid' : '' }}" type="text" name="vat_reg_no" id="vat_reg_no" value="{{ old('vat_reg_no', $partyGroupBd->vat_reg_no) }}">
                        @if($errors->has('vat_reg_no'))
                            <div class="invalid-feedback">
                                {{ $errors->first('vat_reg_no') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.partyGroupBd.fields.vat_reg_no_helper') }}</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="registratn_category">{{ trans('cruds.partyGroupBd.fields.registratn_category') }}</label>
                        <input class="form-control {{ $errors->has('registratn_category') ? 'is-invalid' : '' }}" type="text" name="registratn_category" id="registratn_category" value="{{ old('registratn_category', $partyGroupBd->registratn_category) }}">
                        @if($errors->has('registratn_category'))
                            <div class="invalid-feedback">
                                {{ $errors->first('registratn_category') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.partyGroupBd.fields.registratn_category_helper') }}</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="bin_no">{{ trans('cruds.partyGroupBd.fields.bin_no') }}</label>
                        <input class="form-control {{ $errors->has('bin_no') ? 'is-invalid' : '' }}" type="text" name="bin_no" id="bin_no" value="{{ old('bin_no', $partyGroupBd->bin_no) }}">
                        @if($errors->has('bin_no'))
                            <div class="invalid-feedback">
                                {{ $errors->first('bin_no') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.partyGroupBd.fields.bin_no_helper') }}</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="acct_status">{{ trans('cruds.partyGroupBd.fields.acct_status') }}</label>
                        <input class="form-control {{ $errors->has('acct_status') ? 'is-invalid' : '' }}" type="text" name="acct_status" id="acct_status" value="{{ old('acct_status', $partyGroupBd->acct_status) }}">
                        @if($errors->has('acct_status'))
                            <div class="invalid-feedback">
                                {{ $errors->first('acct_status') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.partyGroupBd.fields.acct_status_helper') }}</span>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="logo_image_url">{{ trans('cruds.partyGroupBd.fields.logo_image_url') }}</label>
                        <div class="needsclick dropzone {{ $errors->has('logo_image_url') ? 'is-invalid' : '' }}" id="logo_image_url-dropzone">
                        </div>
                        @if($errors->has('logo_image_url'))
                            <div class="invalid-feedback">
                                {{ $errors->first('logo_image_url') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.partyGroupBd.fields.logo_image_url_helper') }}</span>
                    </div>
                </div>
            </div>



















            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.logoImageUrlDropzone = {
    url: '{{ route('admin.party-group-bds.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo_image_url"]').remove()
      $('form').append('<input type="hidden" name="logo_image_url" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo_image_url"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($partyGroupBd) && $partyGroupBd->logo_image_url)
      var file = {!! json_encode($partyGroupBd->logo_image_url) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo_image_url" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection
