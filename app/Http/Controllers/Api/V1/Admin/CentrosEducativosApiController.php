<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CentrosEducativo;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCentrosEducativoRequest;
use App\Http\Requests\UpdateCentrosEducativoRequest;
use App\Http\Resources\Admin\CentrosEducativoResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CentrosEducativosApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('centros_educativo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CentrosEducativoResource(CentrosEducativo::with(['ciudad', 'territorio_veci', 'categories_items', 'categories_types', 'team', 'departamento', 'provincia', 'distrito'])->get());
    }

    public function store(StoreCentrosEducativoRequest $request)
    {
        $centrosEducativo = CentrosEducativo::create($request->all());

        if ($request->input('pdf_map', false)) {
            $centrosEducativo->addMedia(storage_path('tmp/uploads/' . $request->input('pdf_map')))->toMediaCollection('pdf_map');
        }

        if ($request->input('gallery', false)) {
            $centrosEducativo->addMedia(storage_path('tmp/uploads/' . $request->input('gallery')))->toMediaCollection('gallery');
        }

        return (new CentrosEducativoResource($centrosEducativo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CentrosEducativo $centrosEducativo)
    {
        abort_if(Gate::denies('centros_educativo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CentrosEducativoResource($centrosEducativo->load(['ciudad', 'territorio_veci', 'categories_items', 'categories_types', 'team', 'departamento', 'provincia', 'distrito']));
    }

    public function update(UpdateCentrosEducativoRequest $request, CentrosEducativo $centrosEducativo)
    {
        $centrosEducativo->update($request->all());

        if ($request->input('pdf_map', false)) {
            if (!$centrosEducativo->pdf_map || $request->input('pdf_map') !== $centrosEducativo->pdf_map->file_name) {
                $centrosEducativo->addMedia(storage_path('tmp/uploads/' . $request->input('pdf_map')))->toMediaCollection('pdf_map');
            }
        } elseif ($centrosEducativo->pdf_map) {
            $centrosEducativo->pdf_map->delete();
        }

        if ($request->input('gallery', false)) {
            if (!$centrosEducativo->gallery || $request->input('gallery') !== $centrosEducativo->gallery->file_name) {
                $centrosEducativo->addMedia(storage_path('tmp/uploads/' . $request->input('gallery')))->toMediaCollection('gallery');
            }
        } elseif ($centrosEducativo->gallery) {
            $centrosEducativo->gallery->delete();
        }

        return (new CentrosEducativoResource($centrosEducativo))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CentrosEducativo $centrosEducativo)
    {
        abort_if(Gate::denies('centros_educativo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $centrosEducativo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
