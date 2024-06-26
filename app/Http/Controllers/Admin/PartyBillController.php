<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartyBillRequest;
use App\Models\PartyBill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PartyBillController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('party_bills_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PartyBill::with(['createdInfo','updatedInfo'])->select(sprintf('%s.*', (new PartyBill)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'party_bills_show';
                $editGate      = 'party_bills_edit';
                $deleteGate    = 'party_bills_delete';
                $crudRoutePart = 'party-bills';

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

            $table->addColumn('supplier_id', function ($row) {
                return $row->supplier_id ? $row->supplier_id : '';
            });

            $table->addColumn('invoice_id', function ($row) {
                return $row->invoice_id ? $row->invoice_id : '';
            });

            $table->editColumn('created_stamp', function ($row) {
                return $row->created_stamp ? $row->created_stamp : '';
            });
            $table->editColumn('last_updated_stamp', function ($row) {
                return $row->last_updated_stamp ? $row->last_updated_stamp : '';
            });

            $table->editColumn('bill_ref_no', function ($row) {
                return $row->bill_ref_no ? $row->bill_ref_no : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'created_by']);

            return $table->make(true);
        }

        return view('admin.party_bills.index');
    }

    public function create()
    {
        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.party_bills.create', compact('created_bies', 'updated_bies'));
    }

    public function store(PartyBillRequest $request)
    {
        PartyBill::create($request->all());
        return redirect()->route('admin.party-bills.index');
    }

    public function show(PartyBill $partyBill)
    {
        abort_if(Gate::denies('party_bills_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.party_bills.show', compact('partyBill'));
    }

    public function edit(PartyBill $partyBill)
    {
        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.party_bills.edit', compact('created_bies', 'updated_bies','partyBill'));
    }

    public function update(PartyBillRequest $request, PartyBill $partyBill)
    {
        $partyBill->update($request->all());
        return redirect()->route('admin.party-bills.index');
    }

    public function destroy(PartyBill $partyBill)
    {
        $partyBill->delete();
        return redirect()->back();
    }
}
