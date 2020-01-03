@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.territorioVeci.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.territorio-vecis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.territorioVeci.fields.id') }}
                        </th>
                        <td>
                            {{ $territorioVeci->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.territorioVeci.fields.city') }}
                        </th>
                        <td>
                            {{ $territorioVeci->city->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.territorioVeci.fields.name') }}
                        </th>
                        <td>
                            {{ $territorioVeci->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.territorio-vecis.index') }}">
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
            <a class="nav-link" href="#territorio_veci_companies" role="tab" data-toggle="tab">
                {{ trans('cruds.company.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#territorio_veci_centros_educativos" role="tab" data-toggle="tab">
                {{ trans('cruds.centrosEducativo.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="territorio_veci_companies">
            @includeIf('admin.territorioVecis.relationships.territorioVeciCompanies', ['companies' => $territorioVeci->territorioVeciCompanies])
        </div>
        <div class="tab-pane" role="tabpanel" id="territorio_veci_centros_educativos">
            @includeIf('admin.territorioVecis.relationships.territorioVeciCentrosEducativos', ['centrosEducativos' => $territorioVeci->territorioVeciCentrosEducativos])
        </div>
    </div>
</div>

@endsection