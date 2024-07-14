<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyNonPurchaseOrderRequest;
use App\Http\Requests\NonPurchaseOrderEntryRequest;
use App\Http\Requests\PurchaseOrderEntryRequest;
use App\Http\Requests\StoreNonPurchaseOrderRequest;
use App\Http\Requests\UpdateNonPurchaseOrderRequest;
use App\Models\Budget;
use App\Models\Department;
use App\Models\NonPurchaseOrder;
use App\Models\Organization;
use App\Models\Product;
use App\Models\PurchaseOrder;
use App\Models\Requisition;
use App\Models\User;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class NonPurchaseOrderController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('non_purchase_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = NonPurchaseOrder::with(['organization'])->select(sprintf('%s.*', (new NonPurchaseOrder)->table));
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
            $table->addColumn('created_by', function ($row) {
                return $row->created_by ? $row->created_by : '';
            });

            $table->addColumn('updated_by', function ($row) {
                return $row->updated_by ? $row->updated_by : '';
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


    public function nonPurchaseOrderEntry(Request $request)
    {
        //$request->session()->forget('product_details');
        $department = Department::pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.nonPurchaseOrders.entry', compact( 'department'));
    }

    public function getNonPurchaseOrder(Request $request)
    {
        $nonPurOrders = NonPurchaseOrder::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->get();

        $orderCount = $nonPurOrders->count() + 1;

        $orderCountPadded = str_pad($orderCount, 5, '0', STR_PAD_LEFT);

        $nonPurchaseOrder = 'BRL-' . Carbon::today()->format('Y') . '-' . Carbon::today()->format('m') . '-' . $orderCountPadded;

        if ($nonPurchaseOrder) {
            return response()->json([
                'success' => true,
                'non_purchase_order' => $nonPurchaseOrder
            ]);
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }


    public function nonPurchaseOrderEntryStore(NonPurchaseOrderEntryRequest $request)
    {
        $request->session()->put('product_details', json_decode($request->product_details));

        $nonPurchaseOrder = NonPurchaseOrder::create([
            'actual_payable_amount' => $request->input('net_payable_amount'),

            'advance_amount' => $request->input('advance_amount'),

            'cell_no' => $request->input('supplier_cell_no'),
            'amount_in_words' => $request->input('in_words'),

            'credit_limit' => $request->input('credit_period'),

            'discount_amount' => $request->input('discount_amount'),
            'email' => $request->input('supplier_email'),
            'entry_date' => $request->input('entry_date'),
            'payment_term' => $request->input('payment_term'),

            'payment_type' => $request->input('payment_type'),

            'non_purchase_order_no' => $request->input('non_purchase_order_no'),
            'reference_date' => $request->input('reference_date'),
            'reference_no' => $request->input('reference_no'),
            'supplier_address' => $request->input('supplier_address'),
            'supplier' => $request->input('supplier'),
            'supplier_name' => $request->input('supplier_name'),
            'total_amount' => $request->input('total_amount'),
            'vat_amount' => $request->input('vat_amount'),
        ]);

        $productDetails = json_decode($request->product_details);

        foreach ($productDetails as $productDetail) {
            Product::create([
                'non_purchase_order_id' => $nonPurchaseOrder->id,
                'brand' => $productDetail->brand,
                'item_name' => $productDetail->item_name,
                'origin' => $productDetail->origin,
                'quantity' => $productDetail->quantity,
                'serial_no' => '',
                'size_or_capacity' => $productDetail->size_capacity,
                'unit_price' => $productDetail->unit_price,
                'uom' => $productDetail->uom,
            ]);
        }

        $request->session()->forget('product_details');
        return redirect()->route('admin.non-purchase-orders.index');
    }
}
