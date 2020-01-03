<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTerritorioVeciRequest;
use App\Http\Requests\StoreTerritorioVeciRequest;
use App\Http\Requests\UpdateTerritorioVeciRequest;
use App\TerritorioVeci;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TerritorioVeciController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('territorio_veci_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $territorioVecis = TerritorioVeci::all();

        return view('admin.territorioVecis.index', compact('territorioVecis'));
    }

    public function create()
    {
        abort_if(Gate::denies('territorio_veci_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cities = City::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.territorioVecis.create', compact('cities'));
    }

    public function store(StoreTerritorioVeciRequest $request)
    {
        $territorioVeci = TerritorioVeci::create($request->all());

        return redirect()->route('admin.territorio-vecis.index');
    }

    public function edit(TerritorioVeci $territorioVeci)
    {
        abort_if(Gate::denies('territorio_veci_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cities = City::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $territorioVeci->load('city', 'team');

        return view('admin.territorioVecis.edit', compact('cities', 'territorioVeci'));
    }

    public function update(UpdateTerritorioVeciRequest $request, TerritorioVeci $territorioVeci)
    {
        $territorioVeci->update($request->all());

        return redirect()->route('admin.territorio-vecis.index');
    }

    public function show(TerritorioVeci $territorioVeci)
    {
        abort_if(Gate::denies('territorio_veci_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $territorioVeci->load('city', 'team', 'territorioVeciCompanies', 'territorioVeciCentrosEducativos');

        return view('admin.territorioVecis.show', compact('territorioVeci'));
    }

    public function destroy(TerritorioVeci $territorioVeci)
    {
        abort_if(Gate::denies('territorio_veci_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $territorioVeci->delete();

        return back();
    }

    public function massDestroy(MassDestroyTerritorioVeciRequest $request)
    {
        TerritorioVeci::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
