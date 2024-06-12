<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePartyTableRequest;
use App\Http\Requests\UpdatePartyTableRequest;
use App\Http\Resources\Admin\PartyTableResource;
use App\Models\PartyTable;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PartyTableApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('party_table_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PartyTableResource(PartyTable::all());
    }

    public function store(StorePartyTableRequest $request)
    {
        $partyTable = PartyTable::create($request->all());

        return (new PartyTableResource($partyTable))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PartyTable $partyTable)
    {
        abort_if(Gate::denies('party_table_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PartyTableResource($partyTable);
    }

    public function update(UpdatePartyTableRequest $request, PartyTable $partyTable)
    {
        $partyTable->update($request->all());

        return (new PartyTableResource($partyTable))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PartyTable $partyTable)
    {
        abort_if(Gate::denies('party_table_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partyTable->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
