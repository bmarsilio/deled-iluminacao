<?php

namespace Iluminacao\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model {

    protected $table = 'il_categoria';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = [
        'deleted_at'
    ];

    protected $fillable = [
        'descricao',
        'resumo'
    ];

    protected $visible = [
        'descricao',
        'resumo'
    ];

    public function produtos()
    {
        return $this->hasMany('Iluminacao\Models\Produto');
    }

}
