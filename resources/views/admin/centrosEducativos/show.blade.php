@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.centrosEducativo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.centros-educativos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.id') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.codcompany') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->codcompany }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.ciudad') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->ciudad->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.territorio_veci') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->territorio_veci->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.turno') }}
                        </th>
                        <td>
                            {{ App\CentrosEducativo::TURNO_SELECT[$centrosEducativo->turno] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.date_index') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->date_index }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.categories_items') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->categories_items->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.categories_types') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->categories_types->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.category_empresa') }}
                        </th>
                        <td>
                            {{ App\CentrosEducativo::CATEGORY_EMPRESA_RADIO[$centrosEducativo->category_empresa] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.name_company') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->name_company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.address') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.reference') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->reference }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.num_float') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->num_float }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.float_company') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->float_company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.caracteristicas') }}
                        </th>
                        <td>
                            {{ App\CentrosEducativo::CARACTERISTICAS_SELECT[$centrosEducativo->caracteristicas] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.uso_local') }}
                        </th>
                        <td>
                            {{ App\CentrosEducativo::USO_LOCAL_SELECT[$centrosEducativo->uso_local] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.material') }}
                        </th>
                        <td>
                            {{ App\CentrosEducativo::MATERIAL_SELECT[$centrosEducativo->material] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.tipoempresa') }}
                        </th>
                        <td>
                            {{ App\CentrosEducativo::TIPOEMPRESA_SELECT[$centrosEducativo->tipoempresa] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.latitude') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->latitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.longitude') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->longitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.link_google_map') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->link_google_map }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $centrosEducativo->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.description') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.pdf_map') }}
                        </th>
                        <td>
                            @foreach($centrosEducativo->pdf_map as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.gallery') }}
                        </th>
                        <td>
                            @foreach($centrosEducativo->gallery as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.website') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->website }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.email') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.telefono') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->telefono }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.telefono_2') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->telefono_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.encargado') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->encargado }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.nivel') }}
                        </th>
                        <td>
                            {{ App\CentrosEducativo::NIVEL_SELECT[$centrosEducativo->nivel] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.gestion') }}
                        </th>
                        <td>
                            {{ App\CentrosEducativo::GESTION_SELECT[$centrosEducativo->gestion] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.supervisa') }}
                        </th>
                        <td>
                            {{ App\CentrosEducativo::SUPERVISA_SELECT[$centrosEducativo->supervisa] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.cant_alumnos') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->cant_alumnos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.cant_docentes') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->cant_docentes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.cant_secciones') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->cant_secciones }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.departamento') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->departamento->departamento ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.provincia') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->provincia->provincia ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.distrito') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->distrito->distrito ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.cod_zip') }}
                        </th>
                        <td>
                            {{ $centrosEducativo->cod_zip }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.centros-educativos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection