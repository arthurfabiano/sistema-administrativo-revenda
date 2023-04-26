<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Saldo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'saldo';

    protected $guarded = ['id'];

    /**
     * Define relacao do movimento estoque e financeiro
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function movimento()
    {
        return $this->morphTo();
    }

    /**
     * Busca ultimo saldo da empresa.
     *
     * @param int $empresa_id
     * @return mixed
     */
    public static function ultimoDaEmpresa(int $empresa_id)
    {
        return self::where('empresa_id', $empresa_id)->latest()->first();
    }

    /**
     * Metodo responsável por buscar por intervalo de data
     *
     * @param string $inicio
     * @param string $final
     * @param $quantidade
     * @return mixed
     */
    /**
     * Busca o saldo da empreas por intervalo
     *
     * @param int $empresa
     * @param string $inicio
     * @param string $final
     * @return mixed
     */
    public static function buscaPorIntervalo(int $empresa, string $inicio, string $final) {
        return self::with('movimento')
                    ->whereBetween('created_at', [$inicio, $final])
                    ->where('empresa_id', $empresa)
                    ->get();
    }
}
