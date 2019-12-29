<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDepartamentoRequest;
use App\Http\Requests\StoreDepartamentoRequest;
use App\Http\Requests\UpdateDepartamentoRequest;
use App\Departamento;

class DepartamentosController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('departamento_access'), 403);

        $departamentos = Departamento::all();

        return view('admin.departamentos.index', compact('departamentos'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('departamento_create'), 403);

        return view('admin.departamentos.create');
    }

    public function store(StoreDepartamentoRequest $request)
    {
        abort_unless(\Gate::allows('departamento_create'), 403);

        $departamento = Departamento::create($request->all());

        return redirect()->route('admin.departamentos.index');
    }

    public function edit(Departamento $departamento)
    {
        abort_unless(\Gate::allows('departamento_edit'), 403);

        return view('admin.departamentos.edit', compact('departamento'));
    }

    public function update(UpdateDepartamentoRequest $request, Departamento $departamento)
    {
        abort_unless(\Gate::allows('departamento_edit'), 403);

        $departamento->update($request->all());

        return redirect()->route('admin.departamentos.index');
    }

    public function show(Departamento $departamento)
    {
        abort_unless(\Gate::allows('departamento_show'), 403);

        return view('admin.departamentos.show', compact('departamento'));
    }

    public function destroy(Departamento $departamento)
    {
        abort_unless(\Gate::allows('departamento_delete'), 403);

        $departamento->delete();

        return back();
    }

    public function massDestroy(MassDestroyDepartamentoRequest $request)
    {
        Departamento::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}