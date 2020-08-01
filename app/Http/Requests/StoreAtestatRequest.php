<?php

namespace App\Http\Requests;

use App\Models\Atestat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAtestatRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('atestat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'       => [
                [
                    'string',
                    'max:100',
                    'required',
                ],
            ],
            'address'    => [
                [
                    'required',
                ],
            ],
            'serie_id'   => [
                [
                    'required',
                    'integer',
                ],
            ],
            'number'     => [
                [
                    'required',
                    'integer',
                    'max:9999999',
                ],
            ],
            'valid_year' => [
                [
                    'string',
                    'required',
                ],
            ],
            'region_id'  => [
                [
                    'required',
                    'integer',
                ],
            ],
            'place_id'   => [
                [
                    'required',
                    'integer',
                ],
            ],
            'image'      => [
                [
                    'required',
                ],
            ],
        ];
    }
}