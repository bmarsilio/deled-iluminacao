<?php

namespace Iluminacao\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Noticia extends Model {

	protected $table = 'il_noticia';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = [
		'deleted_at'
	];

	protected $fillable = [
		'titulo',
		'conteudo'
	];

	protected $visible = [
		'titulo',
		'conteudo'
	];

	public function imagens()
	{
		return $this->hasMany('Iluminacao\Models\NoticiaImagem');
	}
}