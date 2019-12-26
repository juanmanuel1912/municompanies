<?php

namespace App\Http\Requests;

use App\CategoriesItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCategoriesItemRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('categories_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}
