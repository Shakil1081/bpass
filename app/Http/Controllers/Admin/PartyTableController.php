<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPartyTableRequest;
use App\Http\Requests\StorePartyTableRequest;
use App\Http\Requests\UpdatePartyTableRequest;
use App\Models\PartyTable;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PartyTableController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('party_table_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PartyTable::query()->select(sprintf('%s.*', (new PartyTable)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'party_table_show';
                $editGate      = 'party_table_edit';
                $deleteGate    = 'party_table_delete';
                $crudRoutePart = 'party-tables';

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
            $table->editColumn('party_name', function ($row) {
                return $row->party_name ? $row->party_name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.partyTables.index');
    }

    public function create()
    {
        abort_if(Gate::denies('party_table_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partyTables.create');
    }

    public function store(StorePartyTableRequest $request)
    {
        $partyTable = PartyTable::create($request->all());

        return redirect()->route('admin.party-tables.index');
    }

    public function edit(PartyTable $partyTable)
    {
        abort_if(Gate::denies('party_table_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partyTables.edit', compact('partyTable'));
    }

    public function update(UpdatePartyTableRequest $request, PartyTable $partyTable)
    {
        $partyTable->update($request->all());

        return redirect()->route('admin.party-tables.index');
    }

    public function show(PartyTable $partyTable)
    {
        abort_if(Gate::denies('party_table_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partyTables.show', compact('partyTable'));
    }

    public function destroy(PartyTable $partyTable)
    {
        abort_if(Gate::denies('party_table_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partyTable->delete();

        return back();
    }

    public function massDestroy(MassDestroyPartyTableRequest $request)
    {
        $partyTables = PartyTable::find(request('ids'));

        foreach ($partyTables as $partyTable) {
            $partyTable->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
