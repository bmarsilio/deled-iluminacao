<?php

namespace Iluminacao\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model {

    protected $table = 'il_produto';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = [
        'deleted_at'
    ];

    protected $fillable = [
        'categoria_id',
        'titulo',
        'resumo'
    ];

    protected $visible = [
        'resumo'
    ];

    public function categoria()
    {
        return $this->belongsTo('Iluminacao\Models\Categoria');
    }

    public function imagens()
    {
        return $this->hasMany('Iluminacao\Models\ProdutoImagem');
    }

}
