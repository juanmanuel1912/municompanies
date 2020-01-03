@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.categoriesItem.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categories-items.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.categoriesItem.fields.id') }}
                        </th>
                        <td>
                            {{ $categoriesItem->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoriesItem.fields.name') }}
                        </th>
                        <td>
                            {{ $categoriesItem->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categories-items.index') }}">
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
            <a class="nav-link" href="#rubro_categories_types" role="tab" data-toggle="tab">
                {{ trans('cruds.categoriesType.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#categories_items_companies" role="tab" data-toggle="tab">
                {{ trans('cruds.company.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#categories_items_centros_educativos" role="tab" data-toggle="tab">
                {{ trans('cruds.centrosEducativo.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="rubro_categories_types">
            @includeIf('admin.categoriesItems.relationships.rubroCategoriesTypes', ['categoriesTypes' => $categoriesItem->rubroCategoriesTypes])
        </div>
        <div class="tab-pane" role="tabpanel" id="categories_items_companies">
            @includeIf('admin.categoriesItems.relationships.categoriesItemsCompanies', ['companies' => $categoriesItem->categoriesItemsCompanies])
        </div>
        <div class="tab-pane" role="tabpanel" id="categories_items_centros_educativos">
            @includeIf('admin.categoriesItems.relationships.categoriesItemsCentrosEducativos', ['centrosEducativos' => $categoriesItem->categoriesItemsCentrosEducativos])
        </div>
    </div>
</div>

@endsection