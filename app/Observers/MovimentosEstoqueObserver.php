<?php

namespace App\Observers;

use App\Models\MovimentoEstoque;
use App\Models\Saldo;
use Illuminate\Support\Facades\DB;

class MovimentosEstoqueObserver
{
    public function created(MovimentoEstoque $movimentosEstoque)
    {
        $saldo = Saldo::ultimoDaEmpresa($movimentosEstoque->empresa_id);
        $valorSaldo = $saldo->valor ?? 0;

        $movimentosEstoque->saldo()->create([
            'valor' => $valorSaldo + ($movimentosEstoque->quantidade * $movimentosEstoque->valor),
            'empresa_id' => $movimentosEstoque->empresa_id
        ]);
    }

    public function deleted(MovimentoEstoque $movimentosEstoque)
    {
        $saldo = $movimentosEstoque->saldo;
        $valorMovimento = $movimentosEstoque->quantidade * $movimentosEstoque->valor;

        Saldo::where('created_at', '>', $saldo->created_at)->update([
            'valor' => DB::raw("valor - $valorMovimento")
        ]);

        $saldo->delete();
    }
}
