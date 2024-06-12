<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyBudgetRequest;
use App\Http\Requests\StoreBudgetRequest;
use App\Http\Requests\UpdateBudgetRequest;
use App\Models\Budget;
use App\Models\Department;
use App\Models\Organization;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BudgetController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('budget_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Budget::with(['created_by', 'updated_by', 'assign_user', 'department', 'organization', 'proposed_by'])->select(sprintf('%s.*', (new Budget)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'budget_show';
                $editGate      = 'budget_edit';
                $deleteGate    = 'budget_delete';
                $crudRoutePart = 'budgets';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('created_by_name', function ($row) {
                return $row->created_by ? $row->created_by->name : '';
            });

            $table->addColumn('updated_by_name', function ($row) {
                return $row->updated_by ? $row->updated_by->name : '';
            });

            $table->editColumn('budget_amount', function ($row) {
                return $row->budget_amount ? $row->budget_amount : '';
            });

            $table->editColumn('budget_for', function ($row) {
                return $row->budget_for ? $row->budget_for : '';
            });
            $table->editColumn('budget_name', function ($row) {
                return $row->budget_name ? $row->budget_name : '';
            });
            $table->editColumn('budget_reference', function ($row) {
                return $row->budget_reference ? $row->budget_reference : '';
            });
            $table->editColumn('close_reason', function ($row) {
                return $row->close_reason ? $row->close_reason : '';
            });
            $table->editColumn('expense_type', function ($row) {
                return $row->expense_type ? $row->expense_type : '';
            });
            $table->editColumn('is_closed', function ($row) {
                return $row->is_closed ? $row->is_closed : '';
            });
            $table->editColumn('purpose', function ($row) {
                return $row->purpose ? $row->purpose : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });

            $table->addColumn('assign_user_name', function ($row) {
                return $row->assign_user ? $row->assign_user->name : '';
            });

            $table->addColumn('department_department_name', function ($row) {
                return $row->department ? $row->department->department_name : '';
            });

            $table->addColumn('organization_address', function ($row) {
                return $row->organization ? $row->organization->address : '';
            });

            $table->addColumn('proposed_by_name', function ($row) {
                return $row->proposed_by ? $row->proposed_by->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'created_by', 'updated_by', 'assign_user', 'department', 'organization', 'proposed_by']);

            return $table->make(true);
        }

        return view('admin.budgets.index');
    }

    public function create()
    {
        abort_if(Gate::denies('budget_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $assign_users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Department::pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organizations = Organization::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        $proposed_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.budgets.create', compact('assign_users', 'created_bies', 'departments', 'organizations', 'proposed_bies', 'updated_bies'));
    }

    public function store(StoreBudgetRequest $request)
    {
        $budget = Budget::create($request->all());

        return redirect()->route('admin.budgets.index');
    }

    public function edit(Budget $budget)
    {
        abort_if(Gate::denies('budget_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $assign_users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Department::pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organizations = Organization::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        $proposed_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $budget->load('created_by', 'updated_by', 'assign_user', 'department', 'organization', 'proposed_by');

        return view('admin.budgets.edit', compact('assign_users', 'budget', 'created_bies', 'departments', 'organizations', 'proposed_bies', 'updated_bies'));
    }

    public function update(UpdateBudgetRequest $request, Budget $budget)
    {
        $budget->update($request->all());

        return redirect()->route('admin.budgets.index');
    }

    public function show(Budget $budget)
    {
        abort_if(Gate::denies('budget_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $budget->load('created_by', 'updated_by', 'assign_user', 'department', 'organization', 'proposed_by');

        return view('admin.budgets.show', compact('budget'));
    }

    public function destroy(Budget $budget)
    {
        abort_if(Gate::denies('budget_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $budget->delete();

        return back();
    }

    public function massDestroy(MassDestroyBudgetRequest $request)
    {
        $budgets = Budget::find(request('ids'));

        foreach ($budgets as $budget) {
            $budget->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
