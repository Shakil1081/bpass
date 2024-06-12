<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyNonPurchaseOrderRequest;
use App\Http\Requests\StoreNonPurchaseOrderRequest;
use App\Http\Requests\UpdateNonPurchaseOrderRequest;
use App\Models\NonPurchaseOrder;
use App\Models\Organization;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class NonPurchaseOrderController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('non_purchase_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = NonPurchaseOrder::with(['created_by', 'updated_by', 'organization'])->select(sprintf('%s.*', (new NonPurchaseOrder)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'non_purchase_order_show';
                $editGate      = 'non_purchase_order_edit';
                $deleteGate    = 'non_purchase_order_delete';
                $crudRoutePart = 'non-purchase-orders';

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

            $table->editColumn('actual_payable_amount', function ($row) {
                return $row->actual_payable_amount ? $row->actual_payable_amount : '';
            });
            $table->editColumn('advance_amount', function ($row) {
                return $row->advance_amount ? $row->advance_amount : '';
            });
            $table->editColumn('cell_no', function ($row) {
                return $row->cell_no ? $row->cell_no : '';
            });
            $table->editColumn('amount_in_words', function ($row) {
                return $row->amount_in_words ? $row->amount_in_words : '';
            });
            $table->editColumn('credit_limit', function ($row) {
                return $row->credit_limit ? $row->credit_limit : '';
            });
            $table->editColumn('discount_amount', function ($row) {
                return $row->discount_amount ? $row->discount_amount : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });

            $table->editColumn('non_purchase_order_no', function ($row) {
                return $row->non_purchase_order_no ? $row->non_purchase_order_no : '';
            });
            $table->editColumn('payment_term', function ($row) {
                return $row->payment_term ? $row->payment_term : '';
            });

            $table->editColumn('reference_no', function ($row) {
                return $row->reference_no ? $row->reference_no : '';
            });
            $table->editColumn('supplier', function ($row) {
                return $row->supplier ? $row->supplier : '';
            });
            $table->editColumn('supplier_address', function ($row) {
                return $row->supplier_address ? $row->supplier_address : '';
            });
            $table->editColumn('total_amount', function ($row) {
                return $row->total_amount ? $row->total_amount : '';
            });
            $table->editColumn('vat_tax', function ($row) {
                return $row->vat_tax ? $row->vat_tax : '';
            });
            $table->addColumn('organization_address', function ($row) {
                return $row->organization ? $row->organization->address : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'created_by', 'updated_by', 'organization']);

            return $table->make(true);
        }

        return view('admin.nonPurchaseOrders.index');
    }

    public function create()
    {
        abort_if(Gate::denies('non_purchase_order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organizations = Organization::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.nonPurchaseOrders.create', compact('created_bies', 'organizations', 'updated_bies'));
    }

    public function store(StoreNonPurchaseOrderRequest $request)
    {
        $nonPurchaseOrder = NonPurchaseOrder::create($request->all());

        return redirect()->route('admin.non-purchase-orders.index');
    }

    public function edit(NonPurchaseOrder $nonPurchaseOrder)
    {
        abort_if(Gate::denies('non_purchase_order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organizations = Organization::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nonPurchaseOrder->load('created_by', 'updated_by', 'organization');

        return view('admin.nonPurchaseOrders.edit', compact('created_bies', 'nonPurchaseOrder', 'organizations', 'updated_bies'));
    }

    public function update(UpdateNonPurchaseOrderRequest $request, NonPurchaseOrder $nonPurchaseOrder)
    {
        $nonPurchaseOrder->update($request->all());

        return redirect()->route('admin.non-purchase-orders.index');
    }

    public function show(NonPurchaseOrder $nonPurchaseOrder)
    {
        abort_if(Gate::denies('non_purchase_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nonPurchaseOrder->load('created_by', 'updated_by', 'organization');

        return view('admin.nonPurchaseOrders.show', compact('nonPurchaseOrder'));
    }

    public function destroy(NonPurchaseOrder $nonPurchaseOrder)
    {
        abort_if(Gate::denies('non_purchase_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nonPurchaseOrder->delete();

        return back();
    }

    public function massDestroy(MassDestroyNonPurchaseOrderRequest $request)
    {
        $nonPurchaseOrders = NonPurchaseOrder::find(request('ids'));

        foreach ($nonPurchaseOrders as $nonPurchaseOrder) {
            $nonPurchaseOrder->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
