<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPurchaseOrderRequest;
use App\Http\Requests\PurchaseOrderEntryRequest;
use App\Http\Requests\StorePurchaseOrderRequest;
use App\Http\Requests\UpdatePurchaseOrderRequest;
use App\Models\Department;
use App\Models\Organization;
use App\Models\PurchaseOrder;
use App\Models\Requisition;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PurchaseOrderController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('purchase_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PurchaseOrder::with(['updated_by', 'organization', 'approved_by', 'requisition', 'team'])->select(sprintf('%s.*', (new PurchaseOrder)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'purchase_order_show';
                $editGate      = 'purchase_order_edit';
                $deleteGate    = 'purchase_order_delete';
                $crudRoutePart = 'purchase-orders';

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
            $table->addColumn('updated_by_name', function ($row) {
                return $row->updated_by ? $row->updated_by->name : '';
            });

            $table->editColumn('actual_payable_amount', function ($row) {
                return $row->actual_payable_amount ? $row->actual_payable_amount : '';
            });
            $table->editColumn('advance_amount', function ($row) {
                return $row->advance_amount ? $row->advance_amount : '';
            });
            $table->editColumn('amount_in_words', function ($row) {
                return $row->amount_in_words ? $row->amount_in_words : '';
            });
            $table->editColumn('carr_load_up_amount', function ($row) {
                return $row->carr_load_up_amount ? $row->carr_load_up_amount : '';
            });
            $table->editColumn('cell_no', function ($row) {
                return $row->cell_no ? $row->cell_no : '';
            });
            $table->editColumn('credit_limit', function ($row) {
                return $row->credit_limit ? $row->credit_limit : '';
            });
            $table->editColumn('delivery_days', function ($row) {
                return $row->delivery_days ? $row->delivery_days : '';
            });
            $table->editColumn('delivery_term', function ($row) {
                return $row->delivery_term ? $row->delivery_term : '';
            });
            $table->editColumn('discount_amount', function ($row) {
                return $row->discount_amount ? $row->discount_amount : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('is_approve', function ($row) {
                return $row->is_approve ? $row->is_approve : '';
            });

            $table->editColumn('means_of_transport', function ($row) {
                return $row->means_of_transport ? $row->means_of_transport : '';
            });

            $table->editColumn('mpr_no', function ($row) {
                return $row->mpr_no ? $row->mpr_no : '';
            });
            $table->editColumn('payment_term', function ($row) {
                return $row->payment_term ? $row->payment_term : '';
            });
            $table->editColumn('payment_type', function ($row) {
                return $row->payment_type ? $row->payment_type : '';
            });
            $table->editColumn('place_of_delivery', function ($row) {
                return $row->place_of_delivery ? $row->place_of_delivery : '';
            });
            $table->editColumn('place_of_lading', function ($row) {
                return $row->place_of_lading ? $row->place_of_lading : '';
            });
            $table->editColumn('purchase_order_no', function ($row) {
                return $row->purchase_order_no ? $row->purchase_order_no : '';
            });

            $table->editColumn('reference_no', function ($row) {
                return $row->reference_no ? $row->reference_no : '';
            });
            $table->editColumn('supplier_address', function ($row) {
                return $row->supplier_address ? $row->supplier_address : '';
            });
            $table->editColumn('supplier', function ($row) {
                return $row->supplier ? $row->supplier : '';
            });
            $table->editColumn('supplier_name', function ($row) {
                return $row->supplier_name ? $row->supplier_name : '';
            });
            $table->editColumn('total_amount', function ($row) {
                return $row->total_amount ? $row->total_amount : '';
            });
            $table->editColumn('vat_amount', function ($row) {
                return $row->vat_amount ? $row->vat_amount : '';
            });
            $table->addColumn('organization_address', function ($row) {
                return $row->organization ? $row->organization->address : '';
            });

            $table->addColumn('approved_by_name', function ($row) {
                return $row->approved_by ? $row->approved_by->name : '';
            });

            $table->editColumn('is_deleted', function ($row) {
                return $row->is_deleted ? $row->is_deleted : '';
            });

            $table->addColumn('requisition_requisition_date', function ($row) {
                return $row->requisition ? $row->requisition->requisition_date : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'updated_by', 'organization', 'approved_by', 'requisition']);

            return $table->make(true);
        }

        return view('admin.purchaseOrders.index');
    }

    public function create()
    {
        abort_if(Gate::denies('purchase_order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organizations = Organization::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        $approved_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $requisitions = Requisition::pluck('requisition_date', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.purchaseOrders.create', compact('approved_bies', 'organizations', 'requisitions', 'updated_bies'));
    }

    public function store(StorePurchaseOrderRequest $request)
    {
        $purchaseOrder = PurchaseOrder::create($request->all());

        return redirect()->route('admin.purchase-orders.index');
    }

    public function edit(PurchaseOrder $purchaseOrder)
    {
        abort_if(Gate::denies('purchase_order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organizations = Organization::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        $approved_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $requisitions = Requisition::pluck('requisition_date', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchaseOrder->load('updated_by', 'organization', 'approved_by', 'requisition', 'team');

        return view('admin.purchaseOrders.edit', compact('approved_bies', 'organizations', 'purchaseOrder', 'requisitions', 'updated_bies'));
    }

    public function update(UpdatePurchaseOrderRequest $request, PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->update($request->all());

        return redirect()->route('admin.purchase-orders.index');
    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        abort_if(Gate::denies('purchase_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseOrder->load('updated_by', 'organization', 'approved_by', 'requisition', 'team');

        return view('admin.purchaseOrders.show', compact('purchaseOrder'));
    }

    public function destroy(PurchaseOrder $purchaseOrder)
    {
        abort_if(Gate::denies('purchase_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseOrder->delete();

        return back();
    }

    public function massDestroy(MassDestroyPurchaseOrderRequest $request)
    {
        $purchaseOrders = PurchaseOrder::find(request('ids'));

        foreach ($purchaseOrders as $purchaseOrder) {
            $purchaseOrder->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function purchaseOrderEntry()
    {
        $department = Department::pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.purchaseOrders.entry', compact( 'department'));
    }

    public function purchaseOrderEntryStore(PurchaseOrderEntryRequest $request)
    {
        return $request->all();
    }
}
