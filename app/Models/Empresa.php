<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\AbstractPaginator;

class Empresa extends Model
{
    use HasFactory, SoftDeletes;

    /*
   |--------------------------------------------------------------------------
   | GLOBAL VARIABLES
   |--------------------------------------------------------------------------
   */

    // protected $table = 'companies';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['tipo', 'nome', 'razao_social', 'documento', 'ie_rg', 'nome_contato', 'celular', 'email',
        'telefone', 'cep', 'logradouro', 'bairro', 'cidade', 'estado', 'observacao'];
    // protected $hidden = [];
    // protected $dates = [];
    // protected $casts = [];

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

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Busca empresa com id e suas relacões
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public static function buscaPorId(int $id)
    {
        return self::with([
            'movimentosEstoque' => function($query) {
                $query->latest()->take(15);
            },
            'movimentosEstoque.produto' => function($query) {
                $query->withTrashed();
            }
        ])->findOrFail($id);
    }

    /**
     * @param string $tipo
     * @param string $busca
     * @param int $quantidade
     * @return AbstractPaginator
     */
    public static function todasPorTipo(string $tipo, string $busca, int $quantidade = 10): AbstractPaginator
    {
        return self::where('tipo', $tipo)
                    ->where(function($query) use ($busca) {
                        $query->orWhere('nome', 'like', "%$busca%")
                            ->orWhere('razao_social', 'like', "%$busca%")
                            ->orWhere('nome_contato', 'like', "%$busca%");

                    })
                    ->paginate($quantidade);
    }

    /**
     * @param string $nome
     * @param string $tipo
     * @return mixed
     */
    public static function buscarPorNomeTipo(string $nome, string $tipo)
    {
        $nome = '%'. $nome .'%';

        return self::where('nome', 'LIKE', $nome)->where('tipo', $tipo)->get();
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function movimentosEstoque()
    {
        return $this->hasMany(MovimentoEstoque::class);
    }


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
        return sprintf(
            '%s (%s)',
            ucwords($this->attributes['razao_social']),
            ucwords($this->attributes['tipo']),
        );
    }


    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
