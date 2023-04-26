<?php

namespace App\Http\Controllers\Selects;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoPorNome extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Pagination\AbstractPaginator
     */
    public function __invoke(Request $request)
    {
        $nome = $request->nome ?? '';

        return Produto::buscarPorNome($nome);
    }
}
