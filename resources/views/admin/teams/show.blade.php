@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.team.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.teams.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.id') }}
                        </th>
                        <td>
                            {{ $team->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.name') }}
                        </th>
                        <td>
                            {{ $team->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.teams.index') }}">
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
            <a class="nav-link" href="#team_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#team_companies" role="tab" data-toggle="tab">
                {{ trans('cruds.company.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#team_territorio_vecis" role="tab" data-toggle="tab">
                {{ trans('cruds.territorioVeci.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#team_categories_types" role="tab" data-toggle="tab">
                {{ trans('cruds.categoriesType.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#team_categories_items" role="tab" data-toggle="tab">
                {{ trans('cruds.categoriesItem.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#team_cities" role="tab" data-toggle="tab">
                {{ trans('cruds.city.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#team_centros_educativos" role="tab" data-toggle="tab">
                {{ trans('cruds.centrosEducativo.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="team_users">
            @includeIf('admin.teams.relationships.teamUsers', ['users' => $team->teamUsers])
        </div>
        <div class="tab-pane" role="tabpanel" id="team_companies">
            @includeIf('admin.teams.relationships.teamCompanies', ['companies' => $team->teamCompanies])
        </div>
        <div class="tab-pane" role="tabpanel" id="team_territorio_vecis">
            @includeIf('admin.teams.relationships.teamTerritorioVecis', ['territorioVecis' => $team->teamTerritorioVecis])
        </div>
        <div class="tab-pane" role="tabpanel" id="team_categories_types">
            @includeIf('admin.teams.relationships.teamCategoriesTypes', ['categoriesTypes' => $team->teamCategoriesTypes])
        </div>
        <div class="tab-pane" role="tabpanel" id="team_categories_items">
            @includeIf('admin.teams.relationships.teamCategoriesItems', ['categoriesItems' => $team->teamCategoriesItems])
        </div>
        <div class="tab-pane" role="tabpanel" id="team_cities">
            @includeIf('admin.teams.relationships.teamCities', ['cities' => $team->teamCities])
        </div>
        <div class="tab-pane" role="tabpanel" id="team_centros_educativos">
            @includeIf('admin.teams.relationships.teamCentrosEducativos', ['centrosEducativos' => $team->teamCentrosEducativos])
        </div>
    </div>
</div>

@endsection