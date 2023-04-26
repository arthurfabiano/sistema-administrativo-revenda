<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MovimentosFinanceiro extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'movimentos_financeiros';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descricao', 'valor', 'data', 'tipo', 'empresa_id'];

    /**
     * Metodo responsável com a relação com empresa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa');
    }

    /**
     * Metodo responsável por buscar por intervalo de data
     *
     * @param string $inicio
     * @param string $final
     * @param $quantidade
     * @return mixed
     */
    public static function buscaPorIntervalo(string $inicio, string $final, $quantidade = 20) {
        return self::whereBetween('data', [$inicio, $final])
            ->with('empresa')
            ->paginate($quantidade);
    }

    /**
     * Configura a relacao com historico do saldo
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function saldo()
    {
        return $this->MorphOne(Saldo::class, 'movimento');
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */
    public function getDescricaoAttribute($value)
    {
        return ucfirst($value);
    }

    public function getTipoAttribute($value)
    {
        return ucfirst($value);
    }


    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

}
