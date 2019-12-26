<?php

namespace App\Http\Controllers\Admin;

use App\CategoriesItem;
use App\CategoriesType;
use App\City;
use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCompanyRequest;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\TerritorioVeci;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompaniesController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('company_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companies = Company::all();

        return view('admin.companies.index', compact('companies'));
    }

    public function create()
    {
        abort_if(Gate::denies('company_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ciudads = City::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $territorio_vecis = TerritorioVeci::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories_items = CategoriesItem::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories_types = CategoriesType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.companies.create', compact('ciudads', 'territorio_vecis', 'categories_items', 'categories_types'));
    }

    public function store(StoreCompanyRequest $request)
    {
        $company = Company::create($request->all());

        foreach ($request->input('pdf_map', []) as $file) {
            $company->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('pdf_map');
        }

        foreach ($request->input('gallery', []) as $file) {
            $company->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
        }

        return redirect()->route('admin.companies.index');
    }

    public function edit(Company $company)
    {
        abort_if(Gate::denies('company_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ciudads = City::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $territorio_vecis = TerritorioVeci::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories_items = CategoriesItem::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories_types = CategoriesType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $company->load('ciudad', 'territorio_veci', 'categories_items', 'categories_types', 'team');

        return view('admin.companies.edit', compact('ciudads', 'territorio_vecis', 'categories_items', 'categories_types', 'company'));
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->all());

        if (count($company->pdf_map) > 0) {
            foreach ($company->pdf_map as $media) {
                if (!in_array($media->file_name, $request->input('pdf_map', []))) {
                    $media->delete();
                }
            }
        }

        $media = $company->pdf_map->pluck('file_name')->toArray();

        foreach ($request->input('pdf_map', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $company->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('pdf_map');
            }
        }

        if (count($company->gallery) > 0) {
            foreach ($company->gallery as $media) {
                if (!in_array($media->file_name, $request->input('gallery', []))) {
                    $media->delete();
                }
            }
        }

        $media = $company->gallery->pluck('file_name')->toArray();

        foreach ($request->input('gallery', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $company->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
            }
        }

        return redirect()->route('admin.companies.index');
    }

    public function show(Company $company)
    {
        abort_if(Gate::denies('company_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $company->load('ciudad', 'territorio_veci', 'categories_items', 'categories_types', 'team');

        return view('admin.companies.show', compact('company'));
    }

    public function destroy(Company $company)
    {
        abort_if(Gate::denies('company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $company->delete();

        return back();
    }

    public function massDestroy(MassDestroyCompanyRequest $request)
    {
        Company::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
