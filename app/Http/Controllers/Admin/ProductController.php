<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Budget;
use App\Models\NonPurchaseOrder;
use App\Models\Product;
use App\Models\PurchaseOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use NumberToWords\NumberToWords;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        abort_if(Gate::denies('products_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Product::with(['createdInfo','updatedInfo', 'nonPurchasedInfo','purchasedInfo','budgetInfo'])->select(sprintf('%s.*', (new Product)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'products_show';
                $editGate      = 'products_edit';
                $deleteGate    = 'products_delete';
                $crudRoutePart = 'products';

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

            $table->editColumn('nonPurchasedInfo', function ($row) {
                return $row->nonPurchasedInfo ? $row->nonPurchasedInfo->non_purchase_order_no: '';
            });

            $table->editColumn('purchasedInfo', function ($row) {
                return $row->purchasedInfo ? $row->purchasedInfo->purchase_order_no: '';
            });

            $table->editColumn('budgetInfo', function ($row) {
                return $row->budgetInfo ? $row->budgetInfo->budget_name: '';
            });

//            $table->editColumn('budget_details_id', function ($row) {
//                return $row->budgetDetailsInfo ? $row->budgetDetailsInfo: '';
//            });

            $table->editColumn('created_stamp', function ($row) {
                return $row->created_stamp ? $row->created_stamp : '';
            });
            $table->editColumn('last_updated_stamp', function ($row) {
                return $row->last_updated_stamp ? $row->last_updated_stamp : '';
            });

            $table->editColumn('brand', function ($row) {
                return $row->brand ? $row->brand : '';
            });

            $table->editColumn('goods_receive_date', function ($row) {
                return $row->goods_receive_date ? $row->goods_receive_date : '';
            });

            $table->editColumn('item_name', function ($row) {
                return $row->item_name ? $row->item_name : '';
            });

            $table->editColumn('origin', function ($row) {
                return $row->origin ? $row->origin : '';
            });

            $table->editColumn('quantity', function ($row) {
                return $row->quantity ? $row->quantity : '';
            });

            $table->editColumn('serial_no', function ($row) {
                return $row->serial_no ? $row->serial_no : '';
            });

            $table->editColumn('size_or_capacity', function ($row) {
                return $row->size_or_capacity ? $row->size_or_capacity : '';
            });

            $table->editColumn('unit_price', function ($row) {
                return $row->unit_price ? $row->unit_price : '';
            });

            $table->editColumn('uom', function ($row) {
                return $row->uom ? $row->uom : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'created_by']);

            return $table->make(true);
        }

        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nonPurchaseOrders = NonPurchaseOrder::pluck('non_purchase_order_no', 'id')->prepend(trans('global.pleaseSelect'), '');
        $purchaseOrders = PurchaseOrder::pluck('purchase_order_no', 'id')->prepend(trans('global.pleaseSelect'), '');
        $budgets = Budget::pluck('budget_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        //$budgetDetails = Budget::pluck('budget_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.products.create', compact('created_bies', 'updated_bies','nonPurchaseOrders','purchaseOrders','budgets'));
    }

    public function store(ProductRequest $request)
    {
        Product::create($request->all());

        return redirect()->route('admin.products.index');
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('products_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nonPurchaseOrders = NonPurchaseOrder::pluck('non_purchase_order_no', 'id')->prepend(trans('global.pleaseSelect'), '');
        $purchaseOrders = PurchaseOrder::pluck('purchase_order_no', 'id')->prepend(trans('global.pleaseSelect'), '');
        $budgets = Budget::pluck('budget_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        //$budgetDetails = Budget::pluck('budget_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.products.edit', compact('created_bies', 'updated_bies','nonPurchaseOrders','purchaseOrders','budgets','product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }

    public function editOrderProducts()
    {
        return view('admin.products.edit_order_products');
    }

    public function fetchOrderIds(Request $request)
    {
        $orderId = $request->get('orderId', '');
        $orderType = $request->get('orderType', '');

        if ($orderType == 'purchase_order'){
            $orderIds = PurchaseOrder::where('purchase_order_no', 'LIKE', '%' . $orderId . '%')
                ->get(['id', 'purchase_order_no']);
        }else{
            $orderIds = NonPurchaseOrder::where('non_purchase_order_no', 'LIKE', '%' . $orderId . '%')
                ->get(['id', 'non_purchase_order_no']);
        }
        $results = [];
        foreach ($orderIds as $order) {
            $results[] = [
                'value' => $order->id,
                'label' => $order->purchase_order_no ?? $order->non_purchase_order_no,
            ];
        }

        return response()->json($results);
    }

    public function fetchProductsByOrderId($orderId)
    {
        $products = Product::where('purchase_order_id', $orderId)->get();
        return response()->json($products);
    }

    public function updateOrderProducts(Request $request)
    {
        $orderId = $request->order_id;
        $products = $request->input('products', []);

        $rules = [
            '*.quantity' => 'required|integer|min:1',
            '*.unit_price' => 'required|numeric|min:0',
        ];

        $validator = Validator::make($products, $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $finalTotalPrice = 0;

        foreach ($products as $productId => $productData) {
            $product = Product::find($productId);
            if ($product) {
                $product->update($productData);

                $productTotalPrice = $productData['quantity'] * $productData['unit_price'];
                $finalTotalPrice += $productTotalPrice;
            }
        }

        $orderDetails = PurchaseOrder::findOrFail($orderId);

        $totalAmountOrder = $finalTotalPrice + $orderDetails->carr_load_up_amount - $orderDetails->discount_amount;

        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('en');
        $finalTotalAmountInWords = $numberTransformer->toWords($totalAmountOrder);


        $orderDetails->update([
            'actual_payable_amount' => $totalAmountOrder,
            'amount_in_words' => strtoupper($finalTotalAmountInWords),
            'total_amount' => $finalTotalPrice,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Products updated successfully.',
            'redirect_url' => route('admin.products.index')
        ]);
    }
}
