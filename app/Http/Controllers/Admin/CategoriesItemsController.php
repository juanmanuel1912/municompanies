<?php

namespace App\Http\Controllers\Admin;

use App\CategoriesItem;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCategoriesItemRequest;
use App\Http\Requests\StoreCategoriesItemRequest;
use App\Http\Requests\UpdateCategoriesItemRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoriesItemsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('categories_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoriesItems = CategoriesItem::all();

        return view('admin.categoriesItems.index', compact('categoriesItems'));
    }

    public function create()
    {
        abort_if(Gate::denies('categories_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoriesItems.create');
    }

    public function store(StoreCategoriesItemRequest $request)
    {
        $categoriesItem = CategoriesItem::create($request->all());

        return redirect()->route('admin.categories-items.index');
    }

    public function edit(CategoriesItem $categoriesItem)
    {
        abort_if(Gate::denies('categories_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoriesItem->load('team');

        return view('admin.categoriesItems.edit', compact('categoriesItem'));
    }

    public function update(UpdateCategoriesItemRequest $request, CategoriesItem $categoriesItem)
    {
        $categoriesItem->update($request->all());

        return redirect()->route('admin.categories-items.index');
    }

    public function show(CategoriesItem $categoriesItem)
    {
        abort_if(Gate::denies('categories_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoriesItem->load('team');

        return view('admin.categoriesItems.show', compact('categoriesItem'));
    }

    public function destroy(CategoriesItem $categoriesItem)
    {
        abort_if(Gate::denies('categories_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoriesItem->delete();

        return back();
    }

    public function massDestroy(MassDestroyCategoriesItemRequest $request)
    {
        CategoriesItem::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
