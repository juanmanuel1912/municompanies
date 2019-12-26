<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTerritorioVeciRequest;
use App\Http\Requests\UpdateTerritorioVeciRequest;
use App\Http\Resources\Admin\TerritorioVeciResource;
use App\TerritorioVeci;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TerritorioVeciApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('territorio_veci_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TerritorioVeciResource(TerritorioVeci::with(['city', 'team'])->get());
    }

    public function store(StoreTerritorioVeciRequest $request)
    {
        $territorioVeci = TerritorioVeci::create($request->all());

        return (new TerritorioVeciResource($territorioVeci))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TerritorioVeci $territorioVeci)
    {
        abort_if(Gate::denies('territorio_veci_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TerritorioVeciResource($territorioVeci->load(['city', 'team']));
    }

    public function update(UpdateTerritorioVeciRequest $request, TerritorioVeci $territorioVeci)
    {
        $territorioVeci->update($request->all());

        return (new TerritorioVeciResource($territorioVeci))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TerritorioVeci $territorioVeci)
    {
        abort_if(Gate::denies('territorio_veci_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $territorioVeci->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
