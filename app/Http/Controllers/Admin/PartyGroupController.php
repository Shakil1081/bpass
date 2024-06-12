<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPartyGroupRequest;
use App\Http\Requests\StorePartyGroupRequest;
use App\Http\Requests\UpdatePartyGroupRequest;
use App\Models\PartyGroup;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PartyGroupController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('party_group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PartyGroup::query()->select(sprintf('%s.*', (new PartyGroup)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'party_group_show';
                $editGate      = 'party_group_edit';
                $deleteGate    = 'party_group_delete';
                $crudRoutePart = 'party-groups';

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
            $table->editColumn('party', function ($row) {
                return $row->party ? $row->party : '';
            });
            $table->editColumn('group_name', function ($row) {
                return $row->group_name ? $row->group_name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.partyGroups.index');
    }

    public function create()
    {
        abort_if(Gate::denies('party_group_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partyGroups.create');
    }

    public function store(StorePartyGroupRequest $request)
    {
        $partyGroup = PartyGroup::create($request->all());

        return redirect()->route('admin.party-groups.index');
    }

    public function edit(PartyGroup $partyGroup)
    {
        abort_if(Gate::denies('party_group_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partyGroups.edit', compact('partyGroup'));
    }

    public function update(UpdatePartyGroupRequest $request, PartyGroup $partyGroup)
    {
        $partyGroup->update($request->all());

        return redirect()->route('admin.party-groups.index');
    }

    public function show(PartyGroup $partyGroup)
    {
        abort_if(Gate::denies('party_group_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partyGroups.show', compact('partyGroup'));
    }

    public function destroy(PartyGroup $partyGroup)
    {
        abort_if(Gate::denies('party_group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partyGroup->delete();

        return back();
    }

    public function massDestroy(MassDestroyPartyGroupRequest $request)
    {
        $partyGroups = PartyGroup::find(request('ids'));

        foreach ($partyGroups as $partyGroup) {
            $partyGroup->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
