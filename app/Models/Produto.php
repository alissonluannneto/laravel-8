<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'ativo',
        'categoria_id',
        'unidade_medida_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'categoria_id');
    }

    public function unidadeMedida()
    {
        return $this->belongsTo(UnidadeMedida::class,'unidade_medida_id');
    }
}
