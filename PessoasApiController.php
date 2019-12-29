<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePessoaRequest;
use App\Http\Requests\UpdatePessoaRequest;
use App\Pessoa;

class PessoasApiController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::all();

        return $pessoas;
    }

    public function store(StorePessoaRequest $request)
    {
        return Pessoa::create($request->all());
    }

    public function update(UpdatePessoaRequest $request, Pessoa $pessoa)
    {
        return $pessoa->update($request->all());
    }

    public function show(Pessoa $pessoa)
    {
        return $pessoa;
    }

    public function destroy(Pessoa $pessoa)
    {
        return $pessoa->delete();
    }
}
