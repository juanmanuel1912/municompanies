<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CategoriesItem;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoriesItemRequest;
use App\Http\Requests\UpdateCategoriesItemRequest;
use App\Http\Resources\Admin\CategoriesItemResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoriesItemsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('categories_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CategoriesItemResource(CategoriesItem::with(['team'])->get());
    }

    public function store(StoreCategoriesItemRequest $request)
    {
        $categoriesItem = CategoriesItem::create($request->all());

        return (new CategoriesItemResource($categoriesItem))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CategoriesItem $categoriesItem)
    {
        abort_if(Gate::denies('categories_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CategoriesItemResource($categoriesItem->load(['team']));
    }

    public function update(UpdateCategoriesItemRequest $request, CategoriesItem $categoriesItem)
    {
        $categoriesItem->update($request->all());

        return (new CategoriesItemResource($categoriesItem))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CategoriesItem $categoriesItem)
    {
        abort_if(Gate::denies('categories_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoriesItem->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
