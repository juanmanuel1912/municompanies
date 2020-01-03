<?php

namespace App\Http\Controllers\Admin;

use App\CategoriesItem;
use App\CategoriesType;
use App\CentrosEducativo;
use App\City;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCentrosEducativoRequest;
use App\Http\Requests\StoreCentrosEducativoRequest;
use App\Http\Requests\UpdateCentrosEducativoRequest;
use App\TerritorioVeci;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CentrosEducativosController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('centros_educativo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $centrosEducativos = CentrosEducativo::all();

        return view('admin.centrosEducativos.index', compact('centrosEducativos'));
    }

    public function create()
    {
        abort_if(Gate::denies('centros_educativo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ciudads = City::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $territorio_vecis = TerritorioVeci::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories_items = CategoriesItem::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories_types = CategoriesType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departamentos = City::all()->pluck('departamento', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = City::all()->pluck('provincia', 'id')->prepend(trans('global.pleaseSelect'), '');

        $distritos = City::all()->pluck('distrito', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.centrosEducativos.create', compact('ciudads', 'territorio_vecis', 'categories_items', 'categories_types', 'departamentos', 'provincias', 'distritos'));
    }

    public function store(StoreCentrosEducativoRequest $request)
    {
        $centrosEducativo = CentrosEducativo::create($request->all());

        foreach ($request->input('pdf_map', []) as $file) {
            $centrosEducativo->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('pdf_map');
        }

        foreach ($request->input('gallery', []) as $file) {
            $centrosEducativo->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
        }

        return redirect()->route('admin.centros-educativos.index');
    }

    public function edit(CentrosEducativo $centrosEducativo)
    {
        abort_if(Gate::denies('centros_educativo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ciudads = City::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $territorio_vecis = TerritorioVeci::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories_items = CategoriesItem::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories_types = CategoriesType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departamentos = City::all()->pluck('departamento', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = City::all()->pluck('provincia', 'id')->prepend(trans('global.pleaseSelect'), '');

        $distritos = City::all()->pluck('distrito', 'id')->prepend(trans('global.pleaseSelect'), '');

        $centrosEducativo->load('ciudad', 'territorio_veci', 'categories_items', 'categories_types', 'team', 'departamento', 'provincia', 'distrito');

        return view('admin.centrosEducativos.edit', compact('ciudads', 'territorio_vecis', 'categories_items', 'categories_types', 'departamentos', 'provincias', 'distritos', 'centrosEducativo'));
    }

    public function update(UpdateCentrosEducativoRequest $request, CentrosEducativo $centrosEducativo)
    {
        $centrosEducativo->update($request->all());

        if (count($centrosEducativo->pdf_map) > 0) {
            foreach ($centrosEducativo->pdf_map as $media) {
                if (!in_array($media->file_name, $request->input('pdf_map', []))) {
                    $media->delete();
                }
            }
        }

        $media = $centrosEducativo->pdf_map->pluck('file_name')->toArray();

        foreach ($request->input('pdf_map', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $centrosEducativo->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('pdf_map');
            }
        }

        if (count($centrosEducativo->gallery) > 0) {
            foreach ($centrosEducativo->gallery as $media) {
                if (!in_array($media->file_name, $request->input('gallery', []))) {
                    $media->delete();
                }
            }
        }

        $media = $centrosEducativo->gallery->pluck('file_name')->toArray();

        foreach ($request->input('gallery', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $centrosEducativo->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
            }
        }

        return redirect()->route('admin.centros-educativos.index');
    }

    public function show(CentrosEducativo $centrosEducativo)
    {
        abort_if(Gate::denies('centros_educativo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $centrosEducativo->load('ciudad', 'territorio_veci', 'categories_items', 'categories_types', 'team', 'departamento', 'provincia', 'distrito');

        return view('admin.centrosEducativos.show', compact('centrosEducativo'));
    }

    public function destroy(CentrosEducativo $centrosEducativo)
    {
        abort_if(Gate::denies('centros_educativo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $centrosEducativo->delete();

        return back();
    }

    public function massDestroy(MassDestroyCentrosEducativoRequest $request)
    {
        CentrosEducativo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
