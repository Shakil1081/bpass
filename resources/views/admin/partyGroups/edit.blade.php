@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.partyGroup.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.party-groups.update", [$partyGroup->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="party">{{ trans('cruds.partyGroup.fields.party') }}</label>
                <input class="form-control {{ $errors->has('party') ? 'is-invalid' : '' }}" type="text" name="party" id="party" value="{{ old('party', $partyGroup->party) }}" required>
                @if($errors->has('party'))
                    <div class="invalid-feedback">
                        {{ $errors->first('party') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.partyGroup.fields.party_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="group_name">{{ trans('cruds.partyGroup.fields.group_name') }}</label>
                <input class="form-control {{ $errors->has('group_name') ? 'is-invalid' : '' }}" type="text" name="group_name" id="group_name" value="{{ old('group_name', $partyGroup->group_name) }}">
                @if($errors->has('group_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('group_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.partyGroup.fields.group_name_helper') }}</span>
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