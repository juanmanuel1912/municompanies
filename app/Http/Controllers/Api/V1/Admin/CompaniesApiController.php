<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Resources\Admin\CompanyResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompaniesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('company_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompanyResource(Company::with(['ciudad', 'territorio_veci', 'categories_items', 'categories_types', 'team'])->get());
    }

    public function store(StoreCompanyRequest $request)
    {
        $company = Company::create($request->all());

        if ($request->input('pdf_map', false)) {
            $company->addMedia(storage_path('tmp/uploads/' . $request->input('pdf_map')))->toMediaCollection('pdf_map');
        }

        if ($request->input('gallery', false)) {
            $company->addMedia(storage_path('tmp/uploads/' . $request->input('gallery')))->toMediaCollection('gallery');
        }

        return (new CompanyResource($company))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Company $company)
    {
        abort_if(Gate::denies('company_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompanyResource($company->load(['ciudad', 'territorio_veci', 'categories_items', 'categories_types', 'team']));
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->all());

        if ($request->input('pdf_map', false)) {
            if (!$company->pdf_map || $request->input('pdf_map') !== $company->pdf_map->file_name) {
                $company->addMedia(storage_path('tmp/uploads/' . $request->input('pdf_map')))->toMediaCollection('pdf_map');
            }
        } elseif ($company->pdf_map) {
            $company->pdf_map->delete();
        }

        if ($request->input('gallery', false)) {
            if (!$company->gallery || $request->input('gallery') !== $company->gallery->file_name) {
                $company->addMedia(storage_path('tmp/uploads/' . $request->input('gallery')))->toMediaCollection('gallery');
            }
        } elseif ($company->gallery) {
            $company->gallery->delete();
        }

        return (new CompanyResource($company))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Company $company)
    {
        abort_if(Gate::denies('company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $company->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
