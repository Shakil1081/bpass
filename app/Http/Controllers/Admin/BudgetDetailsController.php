<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BudgetDetailsRequest;
use App\Models\Budget;
use App\Models\BudgetDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BudgetDetailsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('budget_details_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BudgetDetails::with(['createdInfo','updatedInfo', 'budgetInfo'])->select(sprintf('%s.*', (new BudgetDetails)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'budget_details_show';
                $editGate      = 'budget_details_edit';
                $deleteGate    = 'budget_details_delete';
                $crudRoutePart = 'budget-details';

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
            $table->addColumn('createdInfo', function ($row) {
                return $row->createdInfo ? $row->createdInfo->name : '';
            });

            $table->addColumn('updatedInfo', function ($row) {
                return $row->updatedInfo ? $row->updatedInfo->name : '';
            });

            $table->editColumn('budgetInfo', function ($row) {
                return $row->budgetInfo ? $row->budgetInfo->budget_name: '';
            });
            $table->editColumn('created_stamp', function ($row) {
                return $row->created_stamp ? $row->created_stamp : '';
            });
            $table->editColumn('last_updated_stamp', function ($row) {
                return $row->last_updated_stamp ? $row->last_updated_stamp : '';
            });

            $table->editColumn('budget_item_name', function ($row) {
                return $row->budget_item_name ? $row->budget_item_name : '';
            });

            $table->editColumn('budget_item_ref_id', function ($row) {
                return $row->budget_item_ref_id ? $row->budget_item_ref_id : '';
            });

            $table->editColumn('budget_item_type', function ($row) {
                return $row->budget_item_type ? $row->budget_item_type : '';
            });

            $table->editColumn('quantity', function ($row) {
                return $row->quantity ? $row->quantity : '';
            });

            $table->editColumn('tolerance', function ($row) {
                return $row->tolerance ? $row->tolerance : '';
            });

            $table->editColumn('unit_price', function ($row) {
                return $row->unit_price ? $row->unit_price : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'created_by']);

            return $table->make(true);
        }

        return view('admin.budget_details.index');
    }

    public function create()
    {
        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $budgets = Budget::pluck('budget_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.budget_details.create', compact('created_bies', 'updated_bies','budgets'));
    }

    public function store(BudgetDetailsRequest $request)
    {
        BudgetDetails::create($request->all());
        return redirect()->route('admin.budget-details.index');
    }

    public function show($id)
    {
        $budgetDetails = BudgetDetails::where('id', $id)->first();
        abort_if(Gate::denies('budget_details_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.budget_details.show', compact('budgetDetails'));
    }

    public function edit($id)
    {
        $budgetDetails = BudgetDetails::where('id', $id)->first();
        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $budgets = Budget::pluck('budget_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.budget_details.edit', compact('created_bies', 'updated_bies','budgets','budgetDetails'));
    }

    public function update(BudgetDetailsRequest $request, $id)
    {
        BudgetDetails::where('id',$id)->update([
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by,
            'budget_id' => $request->budget_id,
            'created_stamp' => $request->created_stamp,
            'last_updated_stamp' => $request->last_updated_stamp,
            'budget_item_name' => $request->budget_item_name,
            'budget_item_ref_id' => $request->budget_item_ref_id,
            'budget_item_type' => $request->budget_item_type,
            'quantity' => $request->quantity,
            'tolerance' => $request->tolerance,
            'unit_price' => $request->unit_price,
        ]);
        return redirect()->route('admin.budget-details.index');
    }

    public function destroy($id)
    {
        BudgetDetails::where('id', $id)->delete();
        return redirect()->back();
    }
}
