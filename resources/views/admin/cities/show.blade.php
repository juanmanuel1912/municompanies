@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.city.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.id') }}
                        </th>
                        <td>
                            {{ $city->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.departamento') }}
                        </th>
                        <td>
                            {{ $city->departamento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.provincia') }}
                        </th>
                        <td>
                            {{ $city->provincia }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.distrito') }}
                        </th>
                        <td>
                            {{ $city->distrito }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.name') }}
                        </th>
                        <td>
                            {{ $city->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cities.index') }}">
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
            <a class="nav-link" href="#city_territorio_vecis" role="tab" data-toggle="tab">
                {{ trans('cruds.territorioVeci.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#ciudad_companies" role="tab" data-toggle="tab">
                {{ trans('cruds.company.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#ciudad_centros_educativos" role="tab" data-toggle="tab">
                {{ trans('cruds.centrosEducativo.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#departamento_centros_educativos" role="tab" data-toggle="tab">
                {{ trans('cruds.centrosEducativo.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#provincia_centros_educativos" role="tab" data-toggle="tab">
                {{ trans('cruds.centrosEducativo.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#distrito_centros_educativos" role="tab" data-toggle="tab">
                {{ trans('cruds.centrosEducativo.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="city_territorio_vecis">
            @includeIf('admin.cities.relationships.cityTerritorioVecis', ['territorioVecis' => $city->cityTerritorioVecis])
        </div>
        <div class="tab-pane" role="tabpanel" id="ciudad_companies">
            @includeIf('admin.cities.relationships.ciudadCompanies', ['companies' => $city->ciudadCompanies])
        </div>
        <div class="tab-pane" role="tabpanel" id="ciudad_centros_educativos">
            @includeIf('admin.cities.relationships.ciudadCentrosEducativos', ['centrosEducativos' => $city->ciudadCentrosEducativos])
        </div>
        <div class="tab-pane" role="tabpanel" id="departamento_centros_educativos">
            @includeIf('admin.cities.relationships.departamentoCentrosEducativos', ['centrosEducativos' => $city->departamentoCentrosEducativos])
        </div>
        <div class="tab-pane" role="tabpanel" id="provincia_centros_educativos">
            @includeIf('admin.cities.relationships.provinciaCentrosEducativos', ['centrosEducativos' => $city->provinciaCentrosEducativos])
        </div>
        <div class="tab-pane" role="tabpanel" id="distrito_centros_educativos">
            @includeIf('admin.cities.relationships.distritoCentrosEducativos', ['centrosEducativos' => $city->distritoCentrosEducativos])
        </div>
    </div>
</div>

@endsection