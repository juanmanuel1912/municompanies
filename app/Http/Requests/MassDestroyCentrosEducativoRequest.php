<?php

namespace App\Http\Requests;

use App\CentrosEducativo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCentrosEducativoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('centros_educativo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:centros_educativos,id',
        ];
    }
}
