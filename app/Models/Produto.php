<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory, SoftDeletes;

    /*
   |--------------------------------------------------------------------------
   | GLOBAL VARIABLES
   |--------------------------------------------------------------------------
   */

    // public $timestamps = false;
    // protected $guarded = ['id'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'produtos';

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
    protected $fillable = ['nome', 'descricao'];

    /**
     * Define dados para serialização
     * @var string[]
     */
    protected $visible = ['id', 'text'];

    /**
     * Anexa acessors para serialização
     *
     * @var string[]
     */
    protected $appends = ['text'];

    // protected $hidden = [];
    // protected $dates = [];
    // protected $casts = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Busca por nome
     *
     * @param string $nome
     * @return mixed
     */
    public static function buscarPorNome(string $nome)
    {
        $nome = '%'. $nome .'%';

        return self::where('nome', 'LIKE', $nome)->get();
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
    /**
     * Cria acessor chamado text para serializacao
     *
     * @return string
     */
    public function getTextAttribute(): String
    {
        return ucwords($this->attributes['nome']);
    }


    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

}
