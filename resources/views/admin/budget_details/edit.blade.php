@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.budget_details.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.budget-details.update",$budgetDetails->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="created_by">{{ trans('cruds.budget_details.fields.created_by') }}</label>
                        <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by" id="created_by" required>
                            @foreach($created_bies as $id => $entry)
                                <option value="{{ $id }}" {{ $budgetDetails->created_by == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('created_by'))
                            <div class="invalid-feedback">
                                {{ $errors->first('created_by') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.cheques.fields.created_by_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="updated_by">{{ trans('cruds.budget_details.fields.updated_by') }}</label>
                        <select class="form-control select2 {{ $errors->has('updated_by') ? 'is-invalid' : '' }}" name="updated_by" id="updated_by">
                            @foreach($updated_bies as $id => $entry)
                                <option value="{{ $id }}" {{ $budgetDetails->updated_by == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('updated_by'))
                            <div class="invalid-feedback">
                                {{ $errors->first('updated_by') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget_details.fields.updated_by_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="budget_id">{{ trans('cruds.budget_details.fields.budget_id') }}</label>
                        <select class="form-control select2 {{ $errors->has('budget_id') ? 'is-invalid' : '' }}" name="budget_id" id="budget_id" required>
                            @foreach($budgets as $id => $entry)
                                <option value="{{ $id }}" {{ $budgetDetails->budget_id == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('bank_account_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('bank_account_id') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget_details.fields.budget_id_helper') }}</span>
                    </div>
                </div>



                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="created_stamp">{{ trans('cruds.budget_details.fields.created_stamp') }}</label>
                        <input class="form-control {{ $errors->has('created_stamp') ? 'is-invalid' : '' }}" type="text" name="created_stamp" id="created_stamp" value="{{ $budgetDetails->created_stamp }}" required>
                        @if($errors->has('created_stamp'))
                            <div class="invalid-feedback">
                                {{ $errors->first('created_stamp') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget_details.fields.created_stamp_helper') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="last_updated_stamp">{{ trans('cruds.budget_details.fields.last_updated_stamp') }}</label>
                        <input class="form-control {{ $errors->has('last_updated_stamp') ? 'is-invalid' : '' }}" type="text" name="last_updated_stamp" id="last_updated_stamp" value="{{ $budgetDetails->last_updated_stamp }}" required>
                        @if($errors->has('last_updated_stamp'))
                            <div class="invalid-feedback">
                                {{ $errors->first('last_updated_stamp') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget_details.fields.last_updated_stamp_helper') }}</span>
                    </div>
                </div>


                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="budget_item_name">{{ trans('cruds.budget_details.fields.budget_item_name') }}</label>
                        <input class="form-control {{ $errors->has('budget_item_name') ? 'is-invalid' : '' }}" type="text" name="budget_item_name" id="budget_item_name" value="{{ $budgetDetails->budget_item_name }}" required>
                        @if($errors->has('budget_item_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('budget_item_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget_details.fields.budget_item_name_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="budget_item_ref_id">{{ trans('cruds.budget_details.fields.budget_item_ref_id') }}</label>
                        <input class="form-control {{ $errors->has('budget_item_ref_id') ? 'is-invalid' : '' }}" type="text" name="budget_item_ref_id" id="budget_item_ref_id" value="{{ $budgetDetails->budget_item_ref_id }}">
                        @if($errors->has('budget_item_ref_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('budget_item_ref_id') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget_details.fields.budget_item_ref_id_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="budget_item_type">{{ trans('cruds.budget_details.fields.budget_item_type') }}</label>
                        <input class="form-control {{ $errors->has('last_updated_stamp') ? 'is-invalid' : '' }}" type="text" name="budget_item_type" id="budget_item_type" value="{{ $budgetDetails->budget_item_type }}">
                        @if($errors->has('budget_item_type'))
                            <div class="invalid-feedback">
                                {{ $errors->first('budget_item_type') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget_details.fields.budget_item_type_helper') }}</span>
                    </div>
                </div>




                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="quantity">{{ trans('cruds.budget_details.fields.quantity') }}</label>
                        <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="text" name="quantity" id="quantity" value="{{ $budgetDetails->quantity }}" required>
                        @if($errors->has('quantity'))
                            <div class="invalid-feedback">
                                {{ $errors->first('quantity') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget_details.fields.quantity_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="tolerance">{{ trans('cruds.budget_details.fields.tolerance') }}</label>
                        <input class="form-control {{ $errors->has('tolerance') ? 'is-invalid' : '' }}" type="text" name="tolerance" id="tolerance" value="{{ $budgetDetails->tolerance }}">
                        @if($errors->has('tolerance'))
                            <div class="invalid-feedback">
                                {{ $errors->first('tolerance') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget_details.fields.tolerance_helper') }}</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label class="required" for="unit_price">{{ trans('cruds.budget_details.fields.unit_price') }}</label>
                        <input class="form-control {{ $errors->has('unit_price') ? 'is-invalid' : '' }}" type="text" name="unit_price" id="unit_price" value="{{ $budgetDetails->unit_price }}" required>
                        @if($errors->has('unit_price'))
                            <div class="invalid-feedback">
                                {{ $errors->first('unit_price') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget_details.fields.unit_price_helper') }}</span>
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
