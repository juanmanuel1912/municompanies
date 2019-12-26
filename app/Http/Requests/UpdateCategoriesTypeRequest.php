<?php

namespace App\Http\Requests;

use App\CategoriesType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCategoriesTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('categories_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'rubro_id' => [
                'required',
                'integer',
            ],
            'name'     => [
                'required',
            ],
        ];
    }
}
