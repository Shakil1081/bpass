<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyFinanceBankRequest;
use App\Http\Requests\StoreFinanceBankRequest;
use App\Http\Requests\UpdateFinanceBankRequest;
use App\Models\FinanceBank;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class FinanceBankController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('finance_bank_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = FinanceBank::with(['createdBy', 'team'])->select(sprintf('%s.*', (new FinanceBank)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'finance_bank_show';
                $editGate      = 'finance_bank_edit';
                $deleteGate    = 'finance_bank_delete';
                $crudRoutePart = 'finance-banks';

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
                return $row->createdBy ? $row->createdBy->full_name : '';
            });

            $table->editColumn('finance_bank_name', function ($row) {
                return $row->finance_bank_name ? $row->finance_bank_name : '';
            });
            $table->editColumn('routing_number', function ($row) {
                return $row->routing_number ? $row->routing_number : '';
            });
            $table->editColumn('short_name', function ($row) {
                return $row->short_name ? $row->short_name : '';
            });
            $table->editColumn('swift_code', function ($row) {
                return $row->swift_code ? $row->swift_code : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'created_by']);

            return $table->make(true);
        }

        return view('admin.financeBanks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('finance_bank_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.financeBanks.create', compact('created_bies'));
    }

    public function store(StoreFinanceBankRequest $request)
    {
        $financeBank = FinanceBank::create($request->all());

        return redirect()->route('admin.finance-banks.index');
    }

    public function edit(FinanceBank $financeBank)
    {
        abort_if(Gate::denies('finance_bank_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $financeBank->load('createdBy', 'team');

        return view('admin.financeBanks.edit', compact('created_bies', 'financeBank'));
    }

    public function update(UpdateFinanceBankRequest $request, FinanceBank $financeBank)
    {
        $financeBank->update($request->all());

        return redirect()->route('admin.finance-banks.index');
    }

    public function show(FinanceBank $financeBank)
    {
        abort_if(Gate::denies('finance_bank_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $financeBank->load('createdBy', 'team');

        return view('admin.financeBanks.show', compact('financeBank'));
    }

    public function destroy(FinanceBank $financeBank)
    {
        abort_if(Gate::denies('finance_bank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $financeBank->delete();

        return back();
    }

    public function massDestroy(MassDestroyFinanceBankRequest $request)
    {
        $financeBanks = FinanceBank::find(request('ids'));

        foreach ($financeBanks as $financeBank) {
            $financeBank->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
