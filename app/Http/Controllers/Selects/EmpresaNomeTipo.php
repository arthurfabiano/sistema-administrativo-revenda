<?php

namespace App\Http\Controllers\Selects;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaNomeTipo extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Pagination\AbstractPaginator
     */
    public function __invoke(Request $request)
    {
        $tipo = $request->tipo === 'entrada' ? 'cliente' : 'fornecedor';
        $nome = $request->nome ?? '';

        return Empresa::buscarPorNomeTipo($nome, $tipo);
    }
}
