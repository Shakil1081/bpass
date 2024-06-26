@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.disbursements.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.disbursements.update",$disbursement->id) }}">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="created_by">{{ trans('cruds.disbursements.fields.created_by') }}</label>
                        <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by" id="created_by" required>
                            @foreach($created_bies as $id => $entry)
                                <option value="{{ $id }}" {{ $disbursement->created_by == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('created_by'))
                            <div class="invalid-feedback">
                                {{ $errors->first('created_by') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.disbursements.fields.created_by_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="updated_by">{{ trans('cruds.disbursements.fields.updated_by') }}</label>
                        <select class="form-control select2 {{ $errors->has('updated_by') ? 'is-invalid' : '' }}" name="updated_by" id="updated_by">
                            @foreach($updated_bies as $id => $entry)
                                <option value="{{ $id }}" {{ $disbursement->updated_by == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('updated_by'))
                            <div class="invalid-feedback">
                                {{ $errors->first('updated_by') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.disbursements.fields.updated_by_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="cheque_id">{{ trans('cruds.disbursements.fields.cheque_id') }}</label>
                        <select class="form-control select2 {{ $errors->has('cheque_id') ? 'is-invalid' : '' }}" name="cheque_id" id="cheque_id" required>
                            @foreach($cheques as $id => $entry)
                                <option value="{{ $id }}" {{ $disbursement->cheque_id == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('cheque_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('cheque_id') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.disbursements.fields.cheque_id_helper') }}</span>
                    </div>
                </div>



                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="created_stamp">{{ trans('cruds.disbursements.fields.created_stamp') }}</label>
                        <input class="form-control {{ $errors->has('created_stamp') ? 'is-invalid' : '' }}" type="text" name="created_stamp" id="created_stamp" value="{{ $disbursement->created_stamp }}" required>
                        @if($errors->has('created_stamp'))
                            <div class="invalid-feedback">
                                {{ $errors->first('created_stamp') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.disbursements.fields.created_stamp_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="last_updated_stamp">{{ trans('cruds.disbursements.fields.last_updated_stamp') }}</label>
                        <input class="form-control {{ $errors->has('last_updated_stamp') ? 'is-invalid' : '' }}" type="text" name="last_updated_stamp" id="last_updated_stamp" value="{{ $disbursement->last_updated_stamp }}" required>
                        @if($errors->has('last_updated_stamp'))
                            <div class="invalid-feedback">
                                {{ $errors->first('last_updated_stamp') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.disbursements.fields.last_updated_stamp_helper') }}</span>
                    </div>
                </div>



                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="disbursed_on">{{ trans('cruds.disbursements.fields.disbursed_on') }}</label>
                        <input class="form-control date {{ $errors->has('disbursed_on') ? 'is-invalid' : '' }}" type="text" name="disbursed_on" id="disbursed_on" value="{{ $disbursement->disbursed_on }}" required>
                        @if($errors->has('disbursed_on'))
                            <div class="invalid-feedback">
                                {{ $errors->first('disbursed_on') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.disbursements.fields.disbursed_on_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="disbursed_to">{{ trans('cruds.disbursements.fields.disbursed_to') }}</label>
                        <input class="form-control {{ $errors->has('disbursed_to') ? 'is-invalid' : '' }}" type="text" name="disbursed_to" id="disbursed_to" value="{{ $disbursement->disbursed_to }}" required>
                        @if($errors->has('disbursed_to'))
                            <div class="invalid-feedback">
                                {{ $errors->first('disbursed_to') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.disbursements.fields.disbursed_to_helper') }}</span>
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
