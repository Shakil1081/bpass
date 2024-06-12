<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyExpenseTypeRequest;
use App\Http\Requests\StoreExpenseTypeRequest;
use App\Http\Requests\UpdateExpenseTypeRequest;
use App\Models\ExpenseType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ExpenseTypeController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('expense_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ExpenseType::query()->select(sprintf('%s.*', (new ExpenseType)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'expense_type_show';
                $editGate      = 'expense_type_edit';
                $deleteGate    = 'expense_type_delete';
                $crudRoutePart = 'expense-types';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('purpose', function ($row) {
                return $row->purpose ? $row->purpose : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.expenseTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('expense_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expenseTypes.create');
    }

    public function store(StoreExpenseTypeRequest $request)
    {
        $expenseType = ExpenseType::create($request->all());

        return redirect()->route('admin.expense-types.index');
    }

    public function edit(ExpenseType $expenseType)
    {
        abort_if(Gate::denies('expense_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expenseTypes.edit', compact('expenseType'));
    }

    public function update(UpdateExpenseTypeRequest $request, ExpenseType $expenseType)
    {
        $expenseType->update($request->all());

        return redirect()->route('admin.expense-types.index');
    }

    public function show(ExpenseType $expenseType)
    {
        abort_if(Gate::denies('expense_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expenseTypes.show', compact('expenseType'));
    }

    public function destroy(ExpenseType $expenseType)
    {
        abort_if(Gate::denies('expense_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expenseType->delete();

        return back();
    }

    public function massDestroy(MassDestroyExpenseTypeRequest $request)
    {
        $expenseTypes = ExpenseType::find(request('ids'));

        foreach ($expenseTypes as $expenseType) {
            $expenseType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
