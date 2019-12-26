@extends('layouts.admin')
@section('content')
@can('territorio_veci_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.territorio-vecis.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.territorioVeci.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TerritorioVeci', 'route' => 'admin.territorio-vecis.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.territorioVeci.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TerritorioVeci">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.territorioVeci.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.territorioVeci.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.territorioVeci.fields.name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($territorioVecis as $key => $territorioVeci)
                        <tr data-entry-id="{{ $territorioVeci->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $territorioVeci->id ?? '' }}
                            </td>
                            <td>
                                {{ $territorioVeci->city->name ?? '' }}
                            </td>
                            <td>
                                {{ $territorioVeci->name ?? '' }}
                            </td>
                            <td>
                                @can('territorio_veci_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.territorio-vecis.show', $territorioVeci->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('territorio_veci_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.territorio-vecis.edit', $territorioVeci->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('territorio_veci_delete')
                                    <form action="{{ route('admin.territorio-vecis.destroy', $territorioVeci->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('territorio_veci_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.territorio-vecis.massDestroy') }}",
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
  $('.datatable-TerritorioVeci:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection