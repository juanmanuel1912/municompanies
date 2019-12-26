<?php

namespace App\Http\Controllers\Admin;

use App\CategoriesItem;
use App\CategoriesType;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCategoriesTypeRequest;
use App\Http\Requests\StoreCategoriesTypeRequest;
use App\Http\Requests\UpdateCategoriesTypeRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoriesTypesController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('categories_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoriesTypes = CategoriesType::all();

        return view('admin.categoriesTypes.index', compact('categoriesTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('categories_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rubros = CategoriesItem::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.categoriesTypes.create', compact('rubros'));
    }

    public function store(StoreCategoriesTypeRequest $request)
    {
        $categoriesType = CategoriesType::create($request->all());

        return redirect()->route('admin.categories-types.index');
    }

    public function edit(CategoriesType $categoriesType)
    {
        abort_if(Gate::denies('categories_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rubros = CategoriesItem::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categoriesType->load('rubro', 'team');

        return view('admin.categoriesTypes.edit', compact('rubros', 'categoriesType'));
    }

    public function update(UpdateCategoriesTypeRequest $request, CategoriesType $categoriesType)
    {
        $categoriesType->update($request->all());

        return redirect()->route('admin.categories-types.index');
    }

    public function show(CategoriesType $categoriesType)
    {
        abort_if(Gate::denies('categories_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoriesType->load('rubro', 'team');

        return view('admin.categoriesTypes.show', compact('categoriesType'));
    }

    public function destroy(CategoriesType $categoriesType)
    {
        abort_if(Gate::denies('categories_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoriesType->delete();

        return back();
    }

    public function massDestroy(MassDestroyCategoriesTypeRequest $request)
    {
        CategoriesType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
