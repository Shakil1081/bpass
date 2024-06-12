@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.budget.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.budgets.update", [$budget->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="created_by_id">{{ trans('cruds.budget.fields.created_by') }}</label>
                        <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by_id" id="created_by_id" required>
                            @foreach($created_bies as $id => $entry)
                                <option value="{{ $id }}" {{ (old('created_by_id') ? old('created_by_id') : $budget->created_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('created_by'))
                            <div class="invalid-feedback">
                                {{ $errors->first('created_by') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget.fields.created_by_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="updated_by_id">{{ trans('cruds.budget.fields.updated_by') }}</label>
                        <select class="form-control select2 {{ $errors->has('updated_by') ? 'is-invalid' : '' }}" name="updated_by_id" id="updated_by_id">
                            @foreach($updated_bies as $id => $entry)
                                <option value="{{ $id }}" {{ (old('updated_by_id') ? old('updated_by_id') : $budget->updated_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('updated_by'))
                            <div class="invalid-feedback">
                                {{ $errors->first('updated_by') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget.fields.updated_by_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="budget_amount">{{ trans('cruds.budget.fields.budget_amount') }}</label>
                        <input class="form-control {{ $errors->has('budget_amount') ? 'is-invalid' : '' }}" type="number" name="budget_amount" id="budget_amount" value="{{ old('budget_amount', $budget->budget_amount) }}" step="0.01" required>
                        @if($errors->has('budget_amount'))
                            <div class="invalid-feedback">
                                {{ $errors->first('budget_amount') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget.fields.budget_amount_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="budget_date">{{ trans('cruds.budget.fields.budget_date') }}</label>
                        <input class="form-control date {{ $errors->has('budget_date') ? 'is-invalid' : '' }}" type="text" name="budget_date" id="budget_date" value="{{ old('budget_date', $budget->budget_date) }}" required>
                        @if($errors->has('budget_date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('budget_date') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget.fields.budget_date_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="budget_for">{{ trans('cruds.budget.fields.budget_for') }}</label>
                        <input class="form-control {{ $errors->has('budget_for') ? 'is-invalid' : '' }}" type="text" name="budget_for" id="budget_for" value="{{ old('budget_for', $budget->budget_for) }}">
                        @if($errors->has('budget_for'))
                            <div class="invalid-feedback">
                                {{ $errors->first('budget_for') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget.fields.budget_for_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="budget_name">{{ trans('cruds.budget.fields.budget_name') }}</label>
                        <input class="form-control {{ $errors->has('budget_name') ? 'is-invalid' : '' }}" type="text" name="budget_name" id="budget_name" value="{{ old('budget_name', $budget->budget_name) }}">
                        @if($errors->has('budget_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('budget_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget.fields.budget_name_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="required" for="budget_reference">{{ trans('cruds.budget.fields.budget_reference') }}</label>
                        <input class="form-control {{ $errors->has('budget_reference') ? 'is-invalid' : '' }}" type="text" name="budget_reference" id="budget_reference" value="{{ old('budget_reference', $budget->budget_reference) }}" required>
                        @if($errors->has('budget_reference'))
                            <div class="invalid-feedback">
                                {{ $errors->first('budget_reference') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget.fields.budget_reference_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="close_reason">{{ trans('cruds.budget.fields.close_reason') }}</label>
                        <input class="form-control {{ $errors->has('close_reason') ? 'is-invalid' : '' }}" type="text" name="close_reason" id="close_reason" value="{{ old('close_reason', $budget->close_reason) }}">
                        @if($errors->has('close_reason'))
                            <div class="invalid-feedback">
                                {{ $errors->first('close_reason') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget.fields.close_reason_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="expense_type">{{ trans('cruds.budget.fields.expense_type') }}</label>
                        <input class="form-control {{ $errors->has('expense_type') ? 'is-invalid' : '' }}" type="text" name="expense_type" id="expense_type" value="{{ old('expense_type', $budget->expense_type) }}">
                        @if($errors->has('expense_type'))
                            <div class="invalid-feedback">
                                {{ $errors->first('expense_type') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget.fields.expense_type_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="is_closed">{{ trans('cruds.budget.fields.is_closed') }}</label>
                        <input class="form-control {{ $errors->has('is_closed') ? 'is-invalid' : '' }}" type="text" name="is_closed" id="is_closed" value="{{ old('is_closed', $budget->is_closed) }}">
                        @if($errors->has('is_closed'))
                            <div class="invalid-feedback">
                                {{ $errors->first('is_closed') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget.fields.is_closed_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="purpose">{{ trans('cruds.budget.fields.purpose') }}</label>
                        <input class="form-control {{ $errors->has('purpose') ? 'is-invalid' : '' }}" type="text" name="purpose" id="purpose" value="{{ old('purpose', $budget->purpose) }}">
                        @if($errors->has('purpose'))
                            <div class="invalid-feedback">
                                {{ $errors->first('purpose') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget.fields.purpose_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="valid_up_to">{{ trans('cruds.budget.fields.valid_up_to') }}</label>
                        <input class="form-control date {{ $errors->has('valid_up_to') ? 'is-invalid' : '' }}" type="text" name="valid_up_to" id="valid_up_to" value="{{ old('valid_up_to', $budget->valid_up_to) }}">
                        @if($errors->has('valid_up_to'))
                            <div class="invalid-feedback">
                                {{ $errors->first('valid_up_to') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget.fields.valid_up_to_helper') }}</span>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="remarks">{{ trans('cruds.budget.fields.remarks') }}</label>
                        <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks', $budget->remarks) }}</textarea>
                        @if($errors->has('remarks'))
                            <div class="invalid-feedback">
                                {{ $errors->first('remarks') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget.fields.remarks_helper') }}</span>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label for="assign_user_id">{{ trans('cruds.budget.fields.assign_user') }}</label>
                        <select class="form-control select2 {{ $errors->has('assign_user') ? 'is-invalid' : '' }}" name="assign_user_id" id="assign_user_id">
                            @foreach($assign_users as $id => $entry)
                                <option value="{{ $id }}" {{ (old('assign_user_id') ? old('assign_user_id') : $budget->assign_user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('assign_user'))
                            <div class="invalid-feedback">
                                {{ $errors->first('assign_user') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget.fields.assign_user_helper') }}</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="required" for="department_id">{{ trans('cruds.budget.fields.department') }}</label>
                        <select class="form-control select2 {{ $errors->has('department') ? 'is-invalid' : '' }}" name="department_id" id="department_id" required>
                            @foreach($departments as $id => $entry)
                                <option value="{{ $id }}" {{ (old('department_id') ? old('department_id') : $budget->department->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('department'))
                            <div class="invalid-feedback">
                                {{ $errors->first('department') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget.fields.department_helper') }}</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="required" for="organization_id">{{ trans('cruds.budget.fields.organization') }}</label>
                        <select class="form-control select2 {{ $errors->has('organization') ? 'is-invalid' : '' }}" name="organization_id" id="organization_id" required>
                            @foreach($organizations as $id => $entry)
                                <option value="{{ $id }}" {{ (old('organization_id') ? old('organization_id') : $budget->organization->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('organization'))
                            <div class="invalid-feedback">
                                {{ $errors->first('organization') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget.fields.organization_helper') }}</span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="proposed_by_id">{{ trans('cruds.budget.fields.proposed_by') }}</label>
                        <select class="form-control select2 {{ $errors->has('proposed_by') ? 'is-invalid' : '' }}" name="proposed_by_id" id="proposed_by_id">
                            @foreach($proposed_bies as $id => $entry)
                                <option value="{{ $id }}" {{ (old('proposed_by_id') ? old('proposed_by_id') : $budget->proposed_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('proposed_by'))
                            <div class="invalid-feedback">
                                {{ $errors->first('proposed_by') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.budget.fields.proposed_by_helper') }}</span>
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
