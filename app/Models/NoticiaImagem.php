<?php

namespace Iluminacao\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NoticiaImagem extends Model
{
    protected $table = 'il_noticia_imagem';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = [
        'deleted_at'
    ];

    protected $fillable = [
        'noticia_id',
        'extensao'
    ];

    protected $visible = [
        'noticia_id',
        'extensao'
    ];

    public function noticia()
    {
        return $this->belongsTo('ILuminacao\Models\Noticia');
    }
}
