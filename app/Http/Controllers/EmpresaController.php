<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use App\Models\Empresa;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmpresaController extends Controller
{
    /**
     * @param string $tipo
     * @return void
     */
    private function validaTipo(string $tipo): Void
    {
        if ($tipo !== 'cliente' && $tipo !== 'fornecedor') {
           \abort(404);
        }
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $tipo = $request->tipo;
        $this->validaTipo($request->tipo);

        $empresas = Empresa::todasPorTipo($request->tipo);

        return view('empresa.index', compact('empresas', 'tipo'));
    }

    /**
     * @param Request $request
     * @return View
     */
    public function create(Request $request): View
    {
        $this->validaTipo($request->tipo);

        return view('empresa.create', ['tipo' => $request->tipo]);
    }

    /**
     * @param EmpresaRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmpresaRequest $request): Response
    {
        $empresa = Empresa::create($request->all());

        return redirect()->route('empresas.show', $empresa->id);
    }

    /**
     * @param Empresa $empresa
     * @return View
     */
    public function show(Empresa $empresa): View
    {
        return view('empresa.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa): View
    {
        return view('empresa.edit', compact('empresa'));
    }

    /**
     * @param EmpresaRequest $request
     * @param Empresa $empresa
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EmpresaRequest $request, Empresa $empresa): Response
    {
        $empresa->update($request->all());

        return redirect()->route('empresa.show', $empresa);
    }

    /**
     * @param Empresa $empresa
     * @param Request $request
     * @return Response
     */
    public function destroy(Empresa $empresa, Request $request)
    {
        $this->validaTipo($request->tipo);

        $empresa->delete();

        return redirect()->route('empresas.index', ['tipo' => $request->tipo]);
    }
}
