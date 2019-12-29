<?php

namespace App\Http\Requests;

use App\Pessoa;
use Illuminate\Foundation\Http\FormRequest;

class StorePessoaRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('pessoa_create');
    }

    public function rules()
    {
        return [
            'nome' => [
                'required',
            ],
            'data_contratacao' => [
                'required',
            ],
            'cargo'    => [
                'required',
            ],
            'salario' => [
                'required',
            ],
            'ramal' => [
                'required',
            ],
            'departamento_id' => [
                'required',
            ],
        ];
    }
}
