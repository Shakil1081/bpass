<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChequeRequest;
use App\Models\BankAccount;
use App\Models\Cheque;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ChequeController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('cheques_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Cheque::with(['createdInfo','updatedInfo', 'bankAccount'])->select(sprintf('%s.*', (new Cheque)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'cheques_show';
                $editGate      = 'cheques_edit';
                $deleteGate    = 'cheques_delete';
                $crudRoutePart = 'cheques';

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

            $table->editColumn('bank_account_id', function ($row) {
                return $row->bankAccount ? $row->bankAccount->account_name: '';
            });
            $table->editColumn('created_stamp', function ($row) {
                return $row->created_stamp ? $row->created_stamp : '';
            });
            $table->editColumn('last_updated_stamp', function ($row) {
                return $row->last_updated_stamp ? $row->last_updated_stamp : '';
            });

            $table->editColumn('cheque_amount', function ($row) {
                return $row->cheque_amount ? $row->cheque_amount : '';
            });

            $table->editColumn('cheque_date', function ($row) {
                return $row->cheque_date ? $row->cheque_date : '';
            });

            $table->editColumn('cheque_no', function ($row) {
                return $row->cheque_no ? $row->cheque_no : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'created_by']);

            return $table->make(true);
        }

        return view('admin.cheque.index');
    }

    public function create()
    {
        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bankAccounts = BankAccount::pluck('account_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.cheque.create', compact('created_bies', 'updated_bies','bankAccounts'));
    }

    public function store(ChequeRequest $request)
    {
        Cheque::create($request->all());

        return redirect()->route('admin.cheques.index');
    }

    public function show(Cheque $cheque)
    {
        abort_if(Gate::denies('cheques_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cheque.show', compact('cheque'));
    }

    public function edit(Cheque $cheque)
    {
        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bankAccounts = BankAccount::pluck('account_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.cheque.edit', compact('created_bies', 'updated_bies','bankAccounts','cheque'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChequeRequest $request, Cheque $cheque)
    {
        $cheque->update($request->all());
        return redirect()->route('admin.cheques.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cheque $cheque)
    {
        $cheque->delete();
        return redirect()->back();
    }
}
