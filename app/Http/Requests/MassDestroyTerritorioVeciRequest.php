<?php

namespace App\Http\Requests;

use App\TerritorioVeci;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTerritorioVeciRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('territorio_veci_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:territorio_vecis,id',
        ];
    }
}
