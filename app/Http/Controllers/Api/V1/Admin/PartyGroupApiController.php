<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePartyGroupRequest;
use App\Http\Requests\UpdatePartyGroupRequest;
use App\Http\Resources\Admin\PartyGroupResource;
use App\Models\PartyGroup;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PartyGroupApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('party_group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PartyGroupResource(PartyGroup::all());
    }

    public function store(StorePartyGroupRequest $request)
    {
        $partyGroup = PartyGroup::create($request->all());

        return (new PartyGroupResource($partyGroup))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PartyGroup $partyGroup)
    {
        abort_if(Gate::denies('party_group_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PartyGroupResource($partyGroup);
    }

    public function update(UpdatePartyGroupRequest $request, PartyGroup $partyGroup)
    {
        $partyGroup->update($request->all());

        return (new PartyGroupResource($partyGroup))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PartyGroup $partyGroup)
    {
        abort_if(Gate::denies('party_group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partyGroup->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
