<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepartamentoRequest;
use App\Http\Requests\UpdateDepartamentoRequest;
use App\Departamento;

class DepartamentosApiController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();

        return $departamentos;
    }

    public function store(StoreDepartamentoRequest $request)
    {
        return Departamento::create($request->all());
    }

    public function update(UpdateDepartamentoRequest $request, Departamento $departamento)
    {
        return $departamento->update($request->all());
    }

    public function show(Departamento $departamento)
    {
        return $departamento;
    }

    public function destroy(Departamento $departamento)
    {
        return $departamento->delete();
    }
}