<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CategoriesType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoriesTypeRequest;
use App\Http\Requests\UpdateCategoriesTypeRequest;
use App\Http\Resources\Admin\CategoriesTypeResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoriesTypesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('categories_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CategoriesTypeResource(CategoriesType::with(['rubro', 'team'])->get());
    }

    public function store(StoreCategoriesTypeRequest $request)
    {
        $categoriesType = CategoriesType::create($request->all());

        return (new CategoriesTypeResource($categoriesType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CategoriesType $categoriesType)
    {
        abort_if(Gate::denies('categories_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CategoriesTypeResource($categoriesType->load(['rubro', 'team']));
    }

    public function update(UpdateCategoriesTypeRequest $request, CategoriesType $categoriesType)
    {
        $categoriesType->update($request->all());

        return (new CategoriesTypeResource($categoriesType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CategoriesType $categoriesType)
    {
        abort_if(Gate::denies('categories_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoriesType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
