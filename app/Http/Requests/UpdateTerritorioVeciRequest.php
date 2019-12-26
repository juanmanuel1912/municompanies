<?php

namespace App\Http\Requests;

use App\TerritorioVeci;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateTerritorioVeciRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('territorio_veci_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'city_id' => [
                'required',
                'integer',
            ],
            'name'    => [
                'required',
            ],
        ];
    }
}
