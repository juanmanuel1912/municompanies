@can('centros_educativo_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.centros-educativos.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.centrosEducativo.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.centrosEducativo.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CentrosEducativo">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.codcompany') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.ciudad') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.territorio_veci') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.turno') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.date_index') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.categories_items') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.categories_types') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.category_empresa') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.name_company') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.reference') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.num_float') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.float_company') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.caracteristicas') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.uso_local') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.material') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.tipoempresa') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.latitude') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.longitude') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.link_google_map') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.active') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.pdf_map') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.gallery') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.website') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.telefono') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.telefono_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.centrosEducativo.fields.encargado') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($centrosEducativos as $key => $centrosEducativo)
                        <tr data-entry-id="{{ $centrosEducativo->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $centrosEducativo->id ?? '' }}
                            </td>
                            <td>
                                {{ $centrosEducativo->codcompany ?? '' }}
                            </td>
                            <td>
                                {{ $centrosEducativo->ciudad->name ?? '' }}
                            </td>
                            <td>
                                {{ $centrosEducativo->territorio_veci->name ?? '' }}
                            </td>
                            <td>
                                {{ App\CentrosEducativo::TURNO_SELECT[$centrosEducativo->turno] ?? '' }}
                            </td>
                            <td>
                                {{ $centrosEducativo->date_index ?? '' }}
                            </td>
                            <td>
                                {{ $centrosEducativo->categories_items->name ?? '' }}
                            </td>
                            <td>
                                {{ $centrosEducativo->categories_types->name ?? '' }}
                            </td>
                            <td>
                                {{ App\CentrosEducativo::CATEGORY_EMPRESA_RADIO[$centrosEducativo->category_empresa] ?? '' }}
                            </td>
                            <td>
                                {{ $centrosEducativo->name_company ?? '' }}
                            </td>
                            <td>
                                {{ $centrosEducativo->address ?? '' }}
                            </td>
                            <td>
                                {{ $centrosEducativo->reference ?? '' }}
                            </td>
                            <td>
                                {{ $centrosEducativo->num_float ?? '' }}
                            </td>
                            <td>
                                {{ $centrosEducativo->float_company ?? '' }}
                            </td>
                            <td>
                                {{ App\CentrosEducativo::CARACTERISTICAS_SELECT[$centrosEducativo->caracteristicas] ?? '' }}
                            </td>
                            <td>
                                {{ App\CentrosEducativo::USO_LOCAL_SELECT[$centrosEducativo->uso_local] ?? '' }}
                            </td>
                            <td>
                                {{ App\CentrosEducativo::MATERIAL_SELECT[$centrosEducativo->material] ?? '' }}
                            </td>
                            <td>
                                {{ App\CentrosEducativo::TIPOEMPRESA_SELECT[$centrosEducativo->tipoempresa] ?? '' }}
                            </td>
                            <td>
                                {{ $centrosEducativo->latitude ?? '' }}
                            </td>
                            <td>
                                {{ $centrosEducativo->longitude ?? '' }}
                            </td>
                            <td>
                                {{ $centrosEducativo->link_google_map ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $centrosEducativo->active ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $centrosEducativo->active ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $centrosEducativo->description ?? '' }}
                            </td>
                            <td>
                                @foreach($centrosEducativo->pdf_map as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($centrosEducativo->gallery as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $centrosEducativo->website ?? '' }}
                            </td>
                            <td>
                                {{ $centrosEducativo->email ?? '' }}
                            </td>
                            <td>
                                {{ $centrosEducativo->telefono ?? '' }}
                            </td>
                            <td>
                                {{ $centrosEducativo->telefono_2 ?? '' }}
                            </td>
                            <td>
                                {{ $centrosEducativo->encargado ?? '' }}
                            </td>
                            <td>
                                @can('centros_educativo_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.centros-educativos.show', $centrosEducativo->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('centros_educativo_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.centros-educativos.edit', $centrosEducativo->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('centros_educativo_delete')
                                    <form action="{{ route('admin.centros-educativos.destroy', $centrosEducativo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('centros_educativo_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.centros-educativos.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-CentrosEducativo:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection