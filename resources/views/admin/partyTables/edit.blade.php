@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.partyTable.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.party-tables.update", [$partyTable->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="party_name">{{ trans('cruds.partyTable.fields.party_name') }}</label>
                <input class="form-control {{ $errors->has('party_name') ? 'is-invalid' : '' }}" type="text" name="party_name" id="party_name" value="{{ old('party_name', $partyTable->party_name) }}">
                @if($errors->has('party_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('party_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.partyTable.fields.party_name_helper') }}</span>
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