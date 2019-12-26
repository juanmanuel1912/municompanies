@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.company.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.companies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.id') }}
                        </th>
                        <td>
                            {{ $company->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.codcompany') }}
                        </th>
                        <td>
                            {{ $company->codcompany }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.ciudad') }}
                        </th>
                        <td>
                            {{ $company->ciudad->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.territorio_veci') }}
                        </th>
                        <td>
                            {{ $company->territorio_veci->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.turno') }}
                        </th>
                        <td>
                            {{ App\Company::TURNO_SELECT[$company->turno] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.date_index') }}
                        </th>
                        <td>
                            {{ $company->date_index }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.categories_items') }}
                        </th>
                        <td>
                            {{ $company->categories_items->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.categories_types') }}
                        </th>
                        <td>
                            {{ $company->categories_types->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.category_empresa') }}
                        </th>
                        <td>
                            {{ App\Company::CATEGORY_EMPRESA_RADIO[$company->category_empresa] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.name_company') }}
                        </th>
                        <td>
                            {{ $company->name_company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.address') }}
                        </th>
                        <td>
                            {{ $company->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.reference') }}
                        </th>
                        <td>
                            {{ $company->reference }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.num_float') }}
                        </th>
                        <td>
                            {{ $company->num_float }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.float_company') }}
                        </th>
                        <td>
                            {{ $company->float_company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.caracteristicas') }}
                        </th>
                        <td>
                            {{ App\Company::CARACTERISTICAS_SELECT[$company->caracteristicas] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.uso_local') }}
                        </th>
                        <td>
                            {{ App\Company::USO_LOCAL_SELECT[$company->uso_local] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.material') }}
                        </th>
                        <td>
                            {{ App\Company::MATERIAL_SELECT[$company->material] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.tipoempresa') }}
                        </th>
                        <td>
                            {{ App\Company::TIPOEMPRESA_SELECT[$company->tipoempresa] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.latitude') }}
                        </th>
                        <td>
                            {{ $company->latitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.longitude') }}
                        </th>
                        <td>
                            {{ $company->longitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.link_google_map') }}
                        </th>
                        <td>
                            {{ $company->link_google_map }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $company->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.description') }}
                        </th>
                        <td>
                            {{ $company->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.pdf_map') }}
                        </th>
                        <td>
                            @foreach($company->pdf_map as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.gallery') }}
                        </th>
                        <td>
                            @foreach($company->gallery as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.website') }}
                        </th>
                        <td>
                            {{ $company->website }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.email') }}
                        </th>
                        <td>
                            {{ $company->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.telefono') }}
                        </th>
                        <td>
                            {{ $company->telefono }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.telefono_2') }}
                        </th>
                        <td>
                            {{ $company->telefono_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.encargado') }}
                        </th>
                        <td>
                            {{ $company->encargado }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.companies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection