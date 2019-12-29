<?php

namespace App\Http\Requests;

use App\Pessoa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyPessoaRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('pessoa_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pessoas,id',
        ];
    }
}
