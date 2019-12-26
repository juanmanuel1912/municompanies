@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.categoriesType.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.categories-types.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="rubro_id">{{ trans('cruds.categoriesType.fields.rubro') }}</label>
                <select class="form-control select2 {{ $errors->has('rubro') ? 'is-invalid' : '' }}" name="rubro_id" id="rubro_id" required>
                    @foreach($rubros as $id => $rubro)
                        <option value="{{ $id }}" {{ old('rubro_id') == $id ? 'selected' : '' }}>{{ $rubro }}</option>
                    @endforeach
                </select>
                @if($errors->has('rubro_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rubro_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.categoriesType.fields.rubro_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.categoriesType.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.categoriesType.fields.name_helper') }}</span>
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