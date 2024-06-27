<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BarCodeRequest;
use App\Models\BarCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BarCodeController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('bar_codes_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Barcode::with(['createdInfo','updatedInfo'])->select(sprintf('%s.*', (new Barcode)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'bar_codes_show';
                $editGate      = 'bar_codes_edit';
                $deleteGate    = 'bar_codes_delete';
                $crudRoutePart = 'barcodes';

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

//            $table->editColumn('invoiceInfo', function ($row) {
//                return $row->invoiceInfo ? $row->invoiceInfo->invoice: '';
//            });
            $table->editColumn('created_stamp', function ($row) {
                return $row->created_stamp ? $row->created_stamp : '';
            });
            $table->editColumn('last_updated_stamp', function ($row) {
                return $row->last_updated_stamp ? $row->last_updated_stamp : '';
            });

            $table->editColumn('bar_code', function ($row) {
                return $row->bar_code ? $row->bar_code : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'created_by']);

            return $table->make(true);
        }

        return view('admin.bar_codes.index');
    }

    public function create()
    {
        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.bar_codes.create', compact('created_bies', 'updated_bies'));
    }

    public function store(BarCodeRequest $request)
    {
        BarCode::create($request->all());
        return redirect()->route('admin.barcodes.index');
    }

    public function show(Barcode $barcode)
    {
        abort_if(Gate::denies('bar_codes_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.bar_codes.show', compact('barcode'));
    }

    public function edit(Barcode $barcode)
    {
        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.bar_codes.edit', compact('created_bies', 'updated_bies','barcode'));
    }

    public function update(BarCodeRequest $request, BarCode $barcode)
    {
        $barcode->update($request->all());
        return redirect()->route('admin.barcodes.index');
    }

    public function destroy(BarCode $barcode)
    {
        $barcode->delete();
        return redirect()->back();
    }
}
