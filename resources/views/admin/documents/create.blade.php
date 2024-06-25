@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.documents.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.documents.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="created_by">{{ trans('cruds.documents.fields.created_by') }}</label>
                        <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by" id="created_by" required>
                            @foreach($created_bies as $id => $entry)
                                <option value="{{ $id }}" {{ old('created_by') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('created_by'))
                            <div class="invalid-feedback">
                                {{ $errors->first('created_by') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.documents.fields.created_by_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="updated_by">{{ trans('cruds.documents.fields.updated_by') }}</label>
                        <select class="form-control select2 {{ $errors->has('updated_by') ? 'is-invalid' : '' }}" name="updated_by" id="updated_by">
                            @foreach($updated_bies as $id => $entry)
                                <option value="{{ $id }}" {{ old('updated_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('updated_by'))
                            <div class="invalid-feedback">
                                {{ $errors->first('updated_by') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.documents.fields.updated_by_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="organization_id">{{ trans('cruds.documents.fields.organization_id') }}</label>
                        <select class="form-control select2 {{ $errors->has('organization_id') ? 'is-invalid' : '' }}" name="organization_id" id="organization_id">
                            @foreach($organizations as $id => $entry)
                                <option value="{{ $id }}" {{ old('organization_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('organization_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('organization_id') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.documents.fields.organization_id_helper') }}</span>
                    </div>
                </div>


                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="created_stamp">{{ trans('cruds.documents.fields.created_stamp') }}</label>
                        <input class="form-control {{ $errors->has('created_stamp') ? 'is-invalid' : '' }}" type="text" name="created_stamp" id="created_stamp" value="{{ old('created_stamp', '') }}" required>
                        @if($errors->has('created_stamp'))
                            <div class="invalid-feedback">
                                {{ $errors->first('created_stamp') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.documents.fields.created_stamp_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="last_updated_stamp">{{ trans('cruds.documents.fields.last_updated_stamp') }}</label>
                        <input class="form-control {{ $errors->has('last_updated_stamp') ? 'is-invalid' : '' }}" type="text" name="last_updated_stamp" id="last_updated_stamp" value="{{ old('last_updated_stamp', '') }}" required>
                        @if($errors->has('last_updated_stamp'))
                            <div class="invalid-feedback">
                                {{ $errors->first('last_updated_stamp') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.documents.fields.last_updated_stamp_helper') }}</span>
                    </div>
                </div>


                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="ref_id">{{ trans('cruds.documents.fields.ref_id') }}</label>
                        <input class="form-control {{ $errors->has('ref_id') ? 'is-invalid' : '' }}" type="text" name="ref_id" id="ref_id" value="{{ old('ref_id', '') }}" required>
                        @if($errors->has('ref_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ref_id') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.documents.fields.ref_id_helper') }}</span>
                    </div>
                </div>


                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="ref_table">{{ trans('cruds.documents.fields.ref_table') }}</label>
                        <input class="form-control {{ $errors->has('ref_table') ? 'is-invalid' : '' }}" type="text" name="ref_table" id="ref_table" value="{{ old('ref_table', '') }}" required>
                        @if($errors->has('ref_table'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ref_table') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.documents.fields.ref_table_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="logo">{{ trans('cruds.documents.fields.file_path') }}</label>
                        <input class="form-control {{ $errors->has('file_path') ? 'is-invalid' : '' }}" type="file" name="file_path" id="file_path" value="{{ old('file_path', '') }}">
                        @if($errors->has('file_path'))
                            <div class="invalid-feedback">
                                {{ $errors->first('file_path') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.documents.fields.file_path_helper') }}</span>
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
