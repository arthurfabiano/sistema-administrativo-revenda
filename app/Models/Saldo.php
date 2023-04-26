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
     * Busca ultimo saldo da empresa.
     *
     * @param int $empresa_id
     * @return mixed
     */
    public static function ultimoDaEmpresa(int $empresa_id)
    {
        return self::where('empresa_id', $empresa_id)->latest()->first();
    }
}
