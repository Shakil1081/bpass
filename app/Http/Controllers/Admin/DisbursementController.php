<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DisbursementRequest;
use App\Models\Cheque;
use App\Models\Disbursement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DisbursementController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('cheques_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Disbursement::with(['createdInfo','updatedInfo', 'checkInfo'])->select(sprintf('%s.*', (new Disbursement)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'disbursements_show';
                $editGate      = 'disbursements_edit';
                $deleteGate    = 'disbursements_delete';
                $crudRoutePart = 'disbursements';

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

            $table->editColumn('checkInfo', function ($row) {
                return $row->checkInfo ? $row->checkInfo->cheque_no: '';
            });
            $table->editColumn('created_stamp', function ($row) {
                return $row->created_stamp ? $row->created_stamp : '';
            });
            $table->editColumn('last_updated_stamp', function ($row) {
                return $row->last_updated_stamp ? $row->last_updated_stamp : '';
            });

            $table->editColumn('disbursed_on', function ($row) {
                return $row->disbursed_on ? $row->disbursed_on : '';
            });

            $table->editColumn('disbursed_to', function ($row) {
                return $row->disbursed_to ? $row->disbursed_to : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'created_by']);

            return $table->make(true);
        }

        return view('admin.disbursements.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cheques = Cheque::pluck('cheque_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.disbursements.create', compact('created_bies', 'updated_bies','cheques'));
    }

    public function store(DisbursementRequest $request)
    {
        Disbursement::create($request->all());
        return redirect()->route('admin.disbursements.index');
    }

    public function show(Disbursement $disbursement)
    {
        abort_if(Gate::denies('disbursements_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.disbursements.show', compact('disbursement'));
    }

    public function edit(Disbursement $disbursement)
    {
        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cheques = Cheque::pluck('cheque_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.disbursements.edit', compact('created_bies', 'updated_bies','cheques','disbursement'));
    }

    public function update(Request $request, Disbursement $disbursement)
    {
        $disbursement->update($request->all());
        return redirect()->route('admin.disbursements.index');
    }

    public function destroy(Disbursement $disbursement)
    {
        $disbursement->delete();
        return redirect()->back();
    }
}
