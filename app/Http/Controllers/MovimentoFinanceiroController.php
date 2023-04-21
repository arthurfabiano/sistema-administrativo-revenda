<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Http\Requests\MovimentoFinanceiroRequest;
use App\Models\Movimentos_financeiro;
use Illuminate\Http\Request;

class MovimentoFinanceiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $movimentos_financeiros = Movimentos_financeiro::where('descricao', 'LIKE', "%$keyword%")
                ->orWhere('valor', 'LIKE', "%$keyword%")
                ->orWhere('data', 'LIKE', "%$keyword%")
                ->orWhere('tipo', 'LIKE', "%$keyword%")
                ->orWhere('empresa_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $movimentos_financeiros = Movimentos_financeiro::latest()->paginate($perPage);
        }

        return view('movimentos_financeiros.index', compact('movimentos_financeiros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('movimentos_financeiros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(MovimentoFinanceiroRequest $request)
    {
        Movimentos_financeiro::create($request->all());

        return redirect('movimentos_financeiros')->with('flash_message', 'Movimentos_financeiro added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $movimentos_financeiro = Movimentos_financeiro::findOrFail($id);

        return view('movimentos_financeiros.show', compact('movimentos_financeiro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $movimentos_financeiro = Movimentos_financeiro::findOrFail($id);

        return view('movimentos_financeiros.edit', compact('movimentos_financeiro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(MovimentoFinanceiroRequest $request, $id)
    {
        $movimentos_financeiro = Movimentos_financeiro::findOrFail($id);
        $movimentos_financeiro->update($request->all());

        return redirect('movimentos_financeiros')->with('flash_message', 'Movimentos financeiro updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Movimentos_financeiro::destroy($id);

        return redirect('movimentos_financeiros')->with('flash_message', 'Movimentos financeiro deleted!');
    }
}
