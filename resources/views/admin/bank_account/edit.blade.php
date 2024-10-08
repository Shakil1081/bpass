@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.bank_account.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.bank-account.update",$bankAccount->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="created_by_id">{{ trans('cruds.organization.fields.created_by') }}</label>
                        <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by" id="created_by" required>
                            @foreach($created_bies as $id => $entry)
                                <option value="{{ $id }}" {{ $id ==  $bankAccount->createdBy ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('created_by'))
                            <div class="invalid-feedback">
                                {{ $errors->first('created_by') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.organization.fields.created_by_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="updated_by_id">{{ trans('cruds.bank_account.fields.updated_by') }}</label>
                        <select class="form-control select2 {{ $errors->has('updated_by') ? 'is-invalid' : '' }}" name="updated_by_id" id="updated_by_id">
                            @foreach($updated_bies as $id => $entry)
                                <option value="{{ $id }}" {{ $id ==  $bankAccount->updatedBy ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('updated_by'))
                            <div class="invalid-feedback">
                                {{ $errors->first('updated_by') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bank_account.fields.updated_by_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="updated_by_id">{{ trans('cruds.bank_account.fields.finance_bank_id') }}</label>
                        <select class="form-control select2 {{ $errors->has('finance_bank_id') ? 'is-invalid' : '' }}" name="finance_bank_id" id="finance_bank_id">
                            @foreach($finance_banks as $id => $entry)
                                <option value="{{ $id }}" {{ $id ==  $bankAccount->finance_bank_id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('finance_bank_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('finance_bank_id') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bank_account.fields.finance_bank_id_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="updated_by_id">{{ trans('cruds.bank_account.fields.organization_id') }}</label>
                        <select class="form-control select2 {{ $errors->has('organization_id') ? 'is-invalid' : '' }}" name="organization_id" id="organization_id">
                            @foreach($organizations as $id => $entry)
                                <option value="{{ $id }}" {{ $id ==  $bankAccount->organization_id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('organization_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('organization_id') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bank_account.fields.organization_id_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="created_stamp">{{ trans('cruds.bank_account.fields.created_stamp') }}</label>
                        <input class="form-control {{ $errors->has('created_stamp') ? 'is-invalid' : '' }}" type="text" name="created_stamp" id="created_stamp" value="{{ $bankAccount->created_stamp }}" required>
                        @if($errors->has('created_stamp'))
                            <div class="invalid-feedback">
                                {{ $errors->first('created_stamp') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bank_account.fields.created_stamp_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="last_updated_stamp">{{ trans('cruds.bank_account.fields.last_updated_stamp') }}</label>
                        <input class="form-control {{ $errors->has('last_updated_stamp') ? 'is-invalid' : '' }}" type="text" name="last_updated_stamp" id="last_updated_stamp" value="{{ $bankAccount->last_updated_stamp }}" required>
                        @if($errors->has('last_updated_stamp'))
                            <div class="invalid-feedback">
                                {{ $errors->first('last_updated_stamp') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bank_account.fields.last_updated_stamp_helper') }}</span>
                    </div>
                </div>



                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="account_name">{{ trans('cruds.bank_account.fields.account_name') }}</label>
                        <input class="form-control {{ $errors->has('account_name') ? 'is-invalid' : '' }}" type="text" name="account_name" id="account_name" value="{{ $bankAccount->account_name }}" required>
                        @if($errors->has('account_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('account_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bank_account.fields.account_name_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="account_no">{{ trans('cruds.bank_account.fields.account_no') }}</label>
                        <input class="form-control {{ $errors->has('account_no') ? 'is-invalid' : '' }}" type="text" name="account_no" id="account_no" value="{{ $bankAccount->account_no }}" required>
                        @if($errors->has('account_no'))
                            <div class="invalid-feedback">
                                {{ $errors->first('account_no') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bank_account.fields.account_no_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="branch_name">{{ trans('cruds.bank_account.fields.branch_name') }}</label>
                        <input class="form-control {{ $errors->has('branch_name') ? 'is-invalid' : '' }}" type="text" name="branch_name" id="branch_name" value="{{ $bankAccount->branch_name }}" required>
                        @if($errors->has('branch_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('branch_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.bank_account.fields.branch_name_helper') }}</span>
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
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.organizations.storeMedia') }}',
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
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($organization) && $organization->logo)
      var file = {!! json_encode($organization->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
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
