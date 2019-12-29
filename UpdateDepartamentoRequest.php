<?php

namespace App\Http\Requests;

use App\Departamento;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartamentoRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('departamento_edit');
    }

    public function rules()
    {
        return [
            'departamento' => [
                'required',
            ],
            'andar' => [
                'required',
            ],
            'sala' => [
                'required',
            ],
            'objetivo' => [
                'required',
            ],
        ];
    }
}