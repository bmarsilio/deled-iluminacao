<?php

namespace Iluminacao\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemHome extends Model {

	protected $table = 'il_item_home';
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

	public function imagens()
	{
		return $this->hasMany('Iluminacao\Models\ItemHomeImagem');
	}
}