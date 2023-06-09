<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MovimentoEstoque extends Model
{
    use HasFactory;

    /*
   |--------------------------------------------------------------------------
   | GLOBAL VARIABLES
   |--------------------------------------------------------------------------
   */

    protected $table = 'movimentos_estoque';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];

    /**
     * Campos permitidos em difinicoes em massa
     * @var string[]
     */
    protected $fillable = ['produto_id', 'quantidade', 'valor', 'tipo', 'empresa_id'];
    // protected $hidden = [];
    // protected $dates = [];
    // protected $casts = [];

    // Indica que o movimento de estoque sempre deve carregar a relacao com o produto
    protected $with = ['produto'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produto()
    {
        return $this->belongsTo(Produto::class)->withTrashed();
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


    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
