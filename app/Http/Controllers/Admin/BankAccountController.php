<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BankAccountRequest;
use App\Models\BankAccount;
use App\Models\FinanceBank;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('bank_account_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BankAccount::with(['createdInfo','updatedInfo', 'finance_bank','organization_info'])->select(sprintf('%s.*', (new BankAccount)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'bank_account_show';
                $editGate      = 'bank_account_edit';
                $deleteGate    = 'bank_account_delete';
                $crudRoutePart = 'bank-account';

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

            $table->editColumn('finance_bank_name', function ($row) {
                return $row->finance_bank ? $row->finance_bank->finance_bank_name : '';
            });
            $table->editColumn('organization_name', function ($row) {
                return $row->organization_info ? $row->organization_info->name: '';
            });
            $table->editColumn('created_stamp', function ($row) {
                return $row->created_stamp ? $row->created_stamp : '';
            });
            $table->editColumn('last_updated_stamp', function ($row) {
                return $row->last_updated_stamp ? $row->last_updated_stamp : '';
            });

            $table->editColumn('account_name', function ($row) {
                return $row->account_name ? $row->account_name : '';
            });

            $table->editColumn('account_no', function ($row) {
                return $row->account_no ? $row->account_no : '';
            });

            $table->editColumn('branch_name', function ($row) {
                return $row->branch_name ? $row->branch_name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'created_by']);

            return $table->make(true);
        }

        return view('admin.bank_account.index');
    }

    public function create()
    {
        $created_bies = User::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $finance_banks = FinanceBank::pluck('finance_bank_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organizations = Organization::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.bank_account.create', compact('created_bies', 'updated_bies','finance_banks','organizations'));
    }

    public function store(BankAccountRequest $request)
    {
        BankAccount::create($request->all());

        return redirect()->route('admin.bank-account.index');
    }

    public function show(BankAccount $bankAccount)
    {
        abort_if(Gate::denies('bank_account_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bank_account.show', compact('bankAccount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankAccount $bankAccount)
    {
        $created_bies = User::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $finance_banks = FinanceBank::pluck('finance_bank_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organizations = Organization::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.bank_account.edit', compact('created_bies', 'updated_bies','finance_banks','organizations','bankAccount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BankAccountRequest $request, BankAccount $bankAccount)
    {
        $bankAccount->update($request->all());
        return redirect()->route('admin.bank-account.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankAccount $bankAccount)
    {
        $bankAccount->delete();
        return redirect()->route('admin.bank-account.index');
    }
}
