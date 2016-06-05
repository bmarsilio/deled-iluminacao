<?php

namespace Iluminacao\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemHomeImagem extends Model
{
    protected $table = 'il_item_home_imagem';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = [
        'deleted_at'
    ];

    protected $fillable = [
        'item_home_id',
        'extensao'
    ];

    protected $visible = [
        'item_home_id',
        'extensao'
    ];

    public function itemHome()
    {
        return $this->belongsTo('ILuminacao\Models\ItemHome');
    }
}
