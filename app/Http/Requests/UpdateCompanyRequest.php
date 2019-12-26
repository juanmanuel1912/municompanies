<?php

namespace App\Http\Requests;

use App\Company;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCompanyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('company_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'codcompany'          => [
                'required',
                'unique:companies,codcompany,' . request()->route('company')->id,
            ],
            'ciudad_id'           => [
                'required',
                'integer',
            ],
            'territorio_veci_id'  => [
                'required',
                'integer',
            ],
            'date_index'          => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'categories_items_id' => [
                'required',
                'integer',
            ],
            'categories_types_id' => [
                'required',
                'integer',
            ],
            'name_company'        => [
                'required',
            ],
            'address'             => [
                'required',
            ],
            'num_float'           => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'float_company'       => [
                'min:1',
                'max:50',
            ],
        ];
    }
}
