@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.city.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cities.update", [$city->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="departamento">{{ trans('cruds.city.fields.departamento') }}</label>
                <input class="form-control {{ $errors->has('departamento') ? 'is-invalid' : '' }}" type="text" name="departamento" id="departamento" value="{{ old('departamento', $city->departamento) }}">
                @if($errors->has('departamento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('departamento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.city.fields.departamento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="provincia">{{ trans('cruds.city.fields.provincia') }}</label>
                <input class="form-control {{ $errors->has('provincia') ? 'is-invalid' : '' }}" type="text" name="provincia" id="provincia" value="{{ old('provincia', $city->provincia) }}">
                @if($errors->has('provincia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('provincia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.city.fields.provincia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="distrito">{{ trans('cruds.city.fields.distrito') }}</label>
                <input class="form-control {{ $errors->has('distrito') ? 'is-invalid' : '' }}" type="text" name="distrito" id="distrito" value="{{ old('distrito', $city->distrito) }}">
                @if($errors->has('distrito'))
                    <div class="invalid-feedback">
                        {{ $errors->first('distrito') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.city.fields.distrito_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.city.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $city->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.city.fields.name_helper') }}</span>
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