@can('company_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.companies.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.company.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.company.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Company">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.company.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.codcompany') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.ciudad') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.territorio_veci') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.turno') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.date_index') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.categories_items') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.categories_types') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.category_empresa') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.name_company') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.reference') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.num_float') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.float_company') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.caracteristicas') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.uso_local') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.material') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.tipoempresa') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.latitude') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.longitude') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.link_google_map') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.active') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.pdf_map') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.gallery') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.website') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.telefono') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.telefono_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.encargado') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.cod_zip') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $key => $company)
                        <tr data-entry-id="{{ $company->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $company->id ?? '' }}
                            </td>
                            <td>
                                {{ $company->codcompany ?? '' }}
                            </td>
                            <td>
                                {{ $company->ciudad->name ?? '' }}
                            </td>
                            <td>
                                {{ $company->territorio_veci->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Company::TURNO_SELECT[$company->turno] ?? '' }}
                            </td>
                            <td>
                                {{ $company->date_index ?? '' }}
                            </td>
                            <td>
                                {{ $company->categories_items->name ?? '' }}
                            </td>
                            <td>
                                {{ $company->categories_types->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Company::CATEGORY_EMPRESA_RADIO[$company->category_empresa] ?? '' }}
                            </td>
                            <td>
                                {{ $company->name_company ?? '' }}
                            </td>
                            <td>
                                {{ $company->address ?? '' }}
                            </td>
                            <td>
                                {{ $company->reference ?? '' }}
                            </td>
                            <td>
                                {{ $company->num_float ?? '' }}
                            </td>
                            <td>
                                {{ $company->float_company ?? '' }}
                            </td>
                            <td>
                                {{ App\Company::CARACTERISTICAS_SELECT[$company->caracteristicas] ?? '' }}
                            </td>
                            <td>
                                {{ App\Company::USO_LOCAL_SELECT[$company->uso_local] ?? '' }}
                            </td>
                            <td>
                                {{ App\Company::MATERIAL_SELECT[$company->material] ?? '' }}
                            </td>
                            <td>
                                {{ App\Company::TIPOEMPRESA_SELECT[$company->tipoempresa] ?? '' }}
                            </td>
                            <td>
                                {{ $company->latitude ?? '' }}
                            </td>
                            <td>
                                {{ $company->longitude ?? '' }}
                            </td>
                            <td>
                                {{ $company->link_google_map ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $company->active ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $company->active ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $company->description ?? '' }}
                            </td>
                            <td>
                                @foreach($company->pdf_map as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($company->gallery as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $company->website ?? '' }}
                            </td>
                            <td>
                                {{ $company->email ?? '' }}
                            </td>
                            <td>
                                {{ $company->telefono ?? '' }}
                            </td>
                            <td>
                                {{ $company->telefono_2 ?? '' }}
                            </td>
                            <td>
                                {{ $company->encargado ?? '' }}
                            </td>
                            <td>
                                {{ $company->cod_zip ?? '' }}
                            </td>
                            <td>
                                @can('company_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.companies.show', $company->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('company_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.companies.edit', $company->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('company_delete')
                                    <form action="{{ route('admin.companies.destroy', $company->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('company_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.companies.massDestroy') }}",
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
  $('.datatable-Company:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection