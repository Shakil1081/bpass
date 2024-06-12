<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTermConditionRequest;
use App\Http\Requests\StoreTermConditionRequest;
use App\Http\Requests\UpdateTermConditionRequest;
use App\Models\NonPurchaseOrder;
use App\Models\PurchaseOrder;
use App\Models\TermCondition;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TermConditionController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('term_condition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = TermCondition::with(['created_by', 'updated_by', 'non_purchase_order', 'purchase_order'])->select(sprintf('%s.*', (new TermCondition)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'term_condition_show';
                $editGate      = 'term_condition_edit';
                $deleteGate    = 'term_condition_delete';
                $crudRoutePart = 'term-conditions';

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

            $table->editColumn('term', function ($row) {
                return $row->term ? $row->term : '';
            });
            $table->addColumn('non_purchase_order_actual_payable_amount', function ($row) {
                return $row->non_purchase_order ? $row->non_purchase_order->actual_payable_amount : '';
            });

            $table->addColumn('purchase_order_actual_payable_amount', function ($row) {
                return $row->purchase_order ? $row->purchase_order->actual_payable_amount : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'created_by', 'updated_by', 'non_purchase_order', 'purchase_order']);

            return $table->make(true);
        }

        return view('admin.termConditions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('term_condition_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $non_purchase_orders = NonPurchaseOrder::pluck('actual_payable_amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchase_orders = PurchaseOrder::pluck('actual_payable_amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.termConditions.create', compact('created_bies', 'non_purchase_orders', 'purchase_orders', 'updated_bies'));
    }

    public function store(StoreTermConditionRequest $request)
    {
        $termCondition = TermCondition::create($request->all());

        return redirect()->route('admin.term-conditions.index');
    }

    public function edit(TermCondition $termCondition)
    {
        abort_if(Gate::denies('term_condition_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $non_purchase_orders = NonPurchaseOrder::pluck('actual_payable_amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchase_orders = PurchaseOrder::pluck('actual_payable_amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        $termCondition->load('created_by', 'updated_by', 'non_purchase_order', 'purchase_order');

        return view('admin.termConditions.edit', compact('created_bies', 'non_purchase_orders', 'purchase_orders', 'termCondition', 'updated_bies'));
    }

    public function update(UpdateTermConditionRequest $request, TermCondition $termCondition)
    {
        $termCondition->update($request->all());

        return redirect()->route('admin.term-conditions.index');
    }

    public function show(TermCondition $termCondition)
    {
        abort_if(Gate::denies('term_condition_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $termCondition->load('created_by', 'updated_by', 'non_purchase_order', 'purchase_order');

        return view('admin.termConditions.show', compact('termCondition'));
    }

    public function destroy(TermCondition $termCondition)
    {
        abort_if(Gate::denies('term_condition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $termCondition->delete();

        return back();
    }

    public function massDestroy(MassDestroyTermConditionRequest $request)
    {
        $termConditions = TermCondition::find(request('ids'));

        foreach ($termConditions as $termCondition) {
            $termCondition->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
