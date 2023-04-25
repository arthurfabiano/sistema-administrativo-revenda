<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovimentoEstoqueRequest;
use App\Models\MovimentoEstoque;

class MovimentoEstoqueController extends Controller
{
    /**
     * @param MovimentoEstoqueRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MovimentoEstoqueRequest $request)
    {
        MovimentoEstoque::create($request->all());

        return redirect()->back();
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        MovimentoEstoque::destroy($id);

        return redirect()->back();
    }
}
