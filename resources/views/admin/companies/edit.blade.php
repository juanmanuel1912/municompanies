@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.company.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.companies.update", [$company->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="codcompany">{{ trans('cruds.company.fields.codcompany') }}</label>
                <input class="form-control {{ $errors->has('codcompany') ? 'is-invalid' : '' }}" type="text" name="codcompany" id="codcompany" value="{{ old('codcompany', $company->codcompany) }}" required>
                @if($errors->has('codcompany'))
                    <div class="invalid-feedback">
                        {{ $errors->first('codcompany') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.codcompany_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ciudad_id">{{ trans('cruds.company.fields.ciudad') }}</label>
                <select class="form-control select2 {{ $errors->has('ciudad') ? 'is-invalid' : '' }}" name="ciudad_id" id="ciudad_id" required>
                    @foreach($ciudads as $id => $ciudad)
                        <option value="{{ $id }}" {{ ($company->ciudad ? $company->ciudad->id : old('ciudad_id')) == $id ? 'selected' : '' }}>{{ $ciudad }}</option>
                    @endforeach
                </select>
                @if($errors->has('ciudad_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ciudad_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.ciudad_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="territorio_veci_id">{{ trans('cruds.company.fields.territorio_veci') }}</label>
                <select class="form-control select2 {{ $errors->has('territorio_veci') ? 'is-invalid' : '' }}" name="territorio_veci_id" id="territorio_veci_id" required>
                    @foreach($territorio_vecis as $id => $territorio_veci)
                        <option value="{{ $id }}" {{ ($company->territorio_veci ? $company->territorio_veci->id : old('territorio_veci_id')) == $id ? 'selected' : '' }}>{{ $territorio_veci }}</option>
                    @endforeach
                </select>
                @if($errors->has('territorio_veci_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('territorio_veci_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.territorio_veci_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.company.fields.turno') }}</label>
                <select class="form-control {{ $errors->has('turno') ? 'is-invalid' : '' }}" name="turno" id="turno">
                    <option value disabled {{ old('turno', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Company::TURNO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('turno', $company->turno) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('turno'))
                    <div class="invalid-feedback">
                        {{ $errors->first('turno') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.turno_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_index">{{ trans('cruds.company.fields.date_index') }}</label>
                <input class="form-control date {{ $errors->has('date_index') ? 'is-invalid' : '' }}" type="text" name="date_index" id="date_index" value="{{ old('date_index', $company->date_index) }}">
                @if($errors->has('date_index'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_index') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.date_index_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="categories_items_id">{{ trans('cruds.company.fields.categories_items') }}</label>
                <select class="form-control select2 {{ $errors->has('categories_items') ? 'is-invalid' : '' }}" name="categories_items_id" id="categories_items_id" required>
                    @foreach($categories_items as $id => $categories_items)
                        <option value="{{ $id }}" {{ ($company->categories_items ? $company->categories_items->id : old('categories_items_id')) == $id ? 'selected' : '' }}>{{ $categories_items }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories_items_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('categories_items_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.categories_items_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="categories_types_id">{{ trans('cruds.company.fields.categories_types') }}</label>
                <select class="form-control select2 {{ $errors->has('categories_types') ? 'is-invalid' : '' }}" name="categories_types_id" id="categories_types_id" required>
                    @foreach($categories_types as $id => $categories_types)
                        <option value="{{ $id }}" {{ ($company->categories_types ? $company->categories_types->id : old('categories_types_id')) == $id ? 'selected' : '' }}>{{ $categories_types }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories_types_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('categories_types_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.categories_types_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.company.fields.category_empresa') }}</label>
                @foreach(App\Company::CATEGORY_EMPRESA_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('category_empresa') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="category_empresa_{{ $key }}" name="category_empresa" value="{{ $key }}" {{ old('category_empresa', $company->category_empresa) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="category_empresa_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('category_empresa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category_empresa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.category_empresa_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_company">{{ trans('cruds.company.fields.name_company') }}</label>
                <input class="form-control {{ $errors->has('name_company') ? 'is-invalid' : '' }}" type="text" name="name_company" id="name_company" value="{{ old('name_company', $company->name_company) }}" required>
                @if($errors->has('name_company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_company') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.name_company_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.company.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $company->address) }}" required>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reference">{{ trans('cruds.company.fields.reference') }}</label>
                <textarea class="form-control {{ $errors->has('reference') ? 'is-invalid' : '' }}" name="reference" id="reference">{{ old('reference', $company->reference) }}</textarea>
                @if($errors->has('reference'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reference') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.reference_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="num_float">{{ trans('cruds.company.fields.num_float') }}</label>
                <input class="form-control {{ $errors->has('num_float') ? 'is-invalid' : '' }}" type="number" name="num_float" id="num_float" value="{{ old('num_float', $company->num_float) }}" step="1">
                @if($errors->has('num_float'))
                    <div class="invalid-feedback">
                        {{ $errors->first('num_float') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.num_float_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="float_company">{{ trans('cruds.company.fields.float_company') }}</label>
                <input class="form-control {{ $errors->has('float_company') ? 'is-invalid' : '' }}" type="number" name="float_company" id="float_company" value="{{ old('float_company', $company->float_company) }}" step="0.1" min="1" max="50">
                @if($errors->has('float_company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('float_company') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.float_company_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.company.fields.caracteristicas') }}</label>
                <select class="form-control {{ $errors->has('caracteristicas') ? 'is-invalid' : '' }}" name="caracteristicas" id="caracteristicas">
                    <option value disabled {{ old('caracteristicas', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Company::CARACTERISTICAS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('caracteristicas', $company->caracteristicas) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('caracteristicas'))
                    <div class="invalid-feedback">
                        {{ $errors->first('caracteristicas') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.caracteristicas_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.company.fields.uso_local') }}</label>
                <select class="form-control {{ $errors->has('uso_local') ? 'is-invalid' : '' }}" name="uso_local" id="uso_local">
                    <option value disabled {{ old('uso_local', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Company::USO_LOCAL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('uso_local', $company->uso_local) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('uso_local'))
                    <div class="invalid-feedback">
                        {{ $errors->first('uso_local') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.uso_local_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.company.fields.material') }}</label>
                <select class="form-control {{ $errors->has('material') ? 'is-invalid' : '' }}" name="material" id="material">
                    <option value disabled {{ old('material', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Company::MATERIAL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('material', $company->material) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('material'))
                    <div class="invalid-feedback">
                        {{ $errors->first('material') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.material_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.company.fields.tipoempresa') }}</label>
                <select class="form-control {{ $errors->has('tipoempresa') ? 'is-invalid' : '' }}" name="tipoempresa" id="tipoempresa">
                    <option value disabled {{ old('tipoempresa', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Company::TIPOEMPRESA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tipoempresa', $company->tipoempresa) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipoempresa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tipoempresa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.tipoempresa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="latitude">{{ trans('cruds.company.fields.latitude') }}</label>
                <input class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}" type="number" name="latitude" id="latitude" value="{{ old('latitude', $company->latitude) }}" step="0.00000001">
                @if($errors->has('latitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('latitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.latitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="longitude">{{ trans('cruds.company.fields.longitude') }}</label>
                <input class="form-control {{ $errors->has('longitude') ? 'is-invalid' : '' }}" type="number" name="longitude" id="longitude" value="{{ old('longitude', $company->longitude) }}" step="0.00000001">
                @if($errors->has('longitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('longitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.longitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link_google_map">{{ trans('cruds.company.fields.link_google_map') }}</label>
                <input class="form-control {{ $errors->has('link_google_map') ? 'is-invalid' : '' }}" type="text" name="link_google_map" id="link_google_map" value="{{ old('link_google_map', $company->link_google_map) }}">
                @if($errors->has('link_google_map'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link_google_map') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.link_google_map_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="active" value="0">
                    <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ $company->active || old('active', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">{{ trans('cruds.company.fields.active') }}</label>
                </div>
                @if($errors->has('active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.active_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.company.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $company->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pdf_map">{{ trans('cruds.company.fields.pdf_map') }}</label>
                <div class="needsclick dropzone {{ $errors->has('pdf_map') ? 'is-invalid' : '' }}" id="pdf_map-dropzone">
                </div>
                @if($errors->has('pdf_map'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pdf_map') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.pdf_map_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gallery">{{ trans('cruds.company.fields.gallery') }}</label>
                <div class="needsclick dropzone {{ $errors->has('gallery') ? 'is-invalid' : '' }}" id="gallery-dropzone">
                </div>
                @if($errors->has('gallery'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gallery') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.gallery_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="website">{{ trans('cruds.company.fields.website') }}</label>
                <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text" name="website" id="website" value="{{ old('website', $company->website) }}">
                @if($errors->has('website'))
                    <div class="invalid-feedback">
                        {{ $errors->first('website') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.website_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.company.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $company->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefono">{{ trans('cruds.company.fields.telefono') }}</label>
                <input class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}" type="text" name="telefono" id="telefono" value="{{ old('telefono', $company->telefono) }}">
                @if($errors->has('telefono'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telefono') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.telefono_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefono_2">{{ trans('cruds.company.fields.telefono_2') }}</label>
                <input class="form-control {{ $errors->has('telefono_2') ? 'is-invalid' : '' }}" type="text" name="telefono_2" id="telefono_2" value="{{ old('telefono_2', $company->telefono_2) }}">
                @if($errors->has('telefono_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telefono_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.telefono_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="encargado">{{ trans('cruds.company.fields.encargado') }}</label>
                <input class="form-control {{ $errors->has('encargado') ? 'is-invalid' : '' }}" type="text" name="encargado" id="encargado" value="{{ old('encargado', $company->encargado) }}">
                @if($errors->has('encargado'))
                    <div class="invalid-feedback">
                        {{ $errors->first('encargado') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.company.fields.encargado_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    var uploadedPdfMapMap = {}
Dropzone.options.pdfMapDropzone = {
    url: '{{ route('admin.companies.storeMedia') }}',
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="pdf_map[]" value="' + response.name + '">')
      uploadedPdfMapMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPdfMapMap[file.name]
      }
      $('form').find('input[name="pdf_map[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($company) && $company->pdf_map)
          var files =
            {!! json_encode($company->pdf_map) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="pdf_map[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    var uploadedGalleryMap = {}
Dropzone.options.galleryDropzone = {
    url: '{{ route('admin.companies.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="gallery[]" value="' + response.name + '">')
      uploadedGalleryMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedGalleryMap[file.name]
      }
      $('form').find('input[name="gallery[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($company) && $company->gallery)
      var files =
        {!! json_encode($company->gallery) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="gallery[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection