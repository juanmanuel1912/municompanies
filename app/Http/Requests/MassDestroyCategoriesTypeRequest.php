<?php

namespace App\Http\Requests;

use App\CategoriesType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCategoriesTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('categories_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:categories_types,id',
        ];
    }
}
