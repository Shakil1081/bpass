<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChequeDetailsRequest;
use App\Http\Requests\ChequeRequest;
use App\Models\Cheque;
use App\Models\ChequeDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ChequeDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('cheques_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ChequeDetails::with(['createdInfo','updatedInfo', 'chequeInfo'])->select(sprintf('%s.*', (new ChequeDetails)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'cheques_show';
                $editGate      = 'cheques_edit';
                $deleteGate    = 'cheques_delete';
                $crudRoutePart = 'cheques-details';

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

            $table->editColumn('chequeInfo', function ($row) {
                return $row->chequeInfo ? $row->chequeInfo->cheque_no: '';
            });
            $table->editColumn('created_stamp', function ($row) {
                return $row->created_stamp ? $row->created_stamp : '';
            });
            $table->editColumn('last_updated_stamp', function ($row) {
                return $row->last_updated_stamp ? $row->last_updated_stamp : '';
            });



            $table->rawColumns(['actions', 'placeholder', 'created_by']);

            return $table->make(true);
        }

        return view('admin.cheque.detailsIndex');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cheques = Cheque::pluck('cheque_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.cheque.detailsCreate', compact('created_bies', 'updated_bies','cheques'));
    }

    public function store(ChequeDetailsRequest $request)
    {
        ChequeDetails::create($request->all());
        return redirect()->route('admin.cheques-details.index');
    }

    public function show($id)
    {
        $chequeDetails = ChequeDetails::where('id', $id)->first();
        abort_if(Gate::denies('cheques_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.cheque.detailsShow', compact('chequeDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $chequeDetails = ChequeDetails::where('id', $id)->first();

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cheques = Cheque::pluck('cheque_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.cheque.detailsEdit', compact('created_bies', 'updated_bies','cheques','chequeDetails'));
    }

    public function update(ChequeDetailsRequest $request, $id)
    {
        ChequeDetails::where('id', $id)->update([
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by,
            'cheque_id' => $request->cheque_id,
            'invoice_id' => $request->invoice_id,
            'created_stamp' => $request->created_stamp,
            'last_updated_stamp' => $request->last_updated_stamp,
        ]);
        return redirect()->route('admin.cheques-details.index');
    }

    public function destroy($id)
    {
        ChequeDetails::where('id', $id)->delete();
        return redirect()->back();
    }
}
