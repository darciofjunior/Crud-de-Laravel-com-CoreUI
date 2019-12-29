<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPessoaRequest;
use App\Http\Requests\StorePessoaRequest;
use App\Http\Requests\UpdatePessoaRequest;
use App\Departamento;
use App\Pessoa;

class PessoasController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('pessoa_access'), 403);

        $pessoas = Pessoa::all();

        return view('admin.pessoas.index', compact('pessoas'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('pessoa_create'), 403);

        $departamentos = Departamento::all();

        return view('admin.pessoas.create', compact('departamentos'));
    }

    public function store(StorePessoaRequest $request)
    {
        abort_unless(\Gate::allows('pessoa_create'), 403);

        $pessoa = Pessoa::create($request->all());

        return redirect()->route('admin.pessoas.index');
    }

    public function edit(Pessoa $pessoa)
    {
        abort_unless(\Gate::allows('pessoa_edit'), 403);

        $departamentos = Departamento::all();

        return view('admin.pessoas.edit', compact('pessoa', 'departamentos'));
    }

    public function update(UpdatePessoaRequest $request, Pessoa $pessoa)
    {
        abort_unless(\Gate::allows('pessoa_edit'), 403);

        $pessoa->update($request->all());

        return redirect()->route('admin.pessoas.index');
    }

    public function show(Pessoa $pessoa)
    {
        abort_unless(\Gate::allows('pessoa_show'), 403);

        return view('admin.pessoas.show', compact('pessoa'));
    }

    public function destroy(Pessoa $pessoa)
    {
        abort_unless(\Gate::allows('pessoa_delete'), 403);

        $pessoa->delete();

        return back();
    }

    public function massDestroy(MassDestroyPessoaRequest $request)
    {
        Pessoa::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
