@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.categoriesType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categories-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.categoriesType.fields.id') }}
                        </th>
                        <td>
                            {{ $categoriesType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoriesType.fields.rubro') }}
                        </th>
                        <td>
                            {{ $categoriesType->rubro->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoriesType.fields.name') }}
                        </th>
                        <td>
                            {{ $categoriesType->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categories-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#categories_types_companies" role="tab" data-toggle="tab">
                {{ trans('cruds.company.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#categories_types_centros_educativos" role="tab" data-toggle="tab">
                {{ trans('cruds.centrosEducativo.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="categories_types_companies">
            @includeIf('admin.categoriesTypes.relationships.categoriesTypesCompanies', ['companies' => $categoriesType->categoriesTypesCompanies])
        </div>
        <div class="tab-pane" role="tabpanel" id="categories_types_centros_educativos">
            @includeIf('admin.categoriesTypes.relationships.categoriesTypesCentrosEducativos', ['centrosEducativos' => $categoriesType->categoriesTypesCentrosEducativos])
        </div>
    </div>
</div>

@endsection