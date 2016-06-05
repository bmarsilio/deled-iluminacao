<?php

namespace Iluminacao\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdutoImagem extends Model
{
    protected $table = 'il_produto_imagem';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = [
        'deleted_at'
    ];

    protected $fillable = [
        'produto_id',
        'extensao'
    ];

    protected $visible = [
        'produto_id',
        'extensao'
    ];

    public function produto()
    {
        return $this->belongsTo('Iluminacao\Models\Produto');
    }
}
