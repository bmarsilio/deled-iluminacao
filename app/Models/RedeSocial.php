<?php

namespace Iluminacao\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RedeSocial extends Model {

	protected $table = 'il_rede_social';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = [
		'deleted_at'
	];

	protected $fillable = [
		'descricao',
		'link',
		'icone'
	];

	protected $visible = [
		'descricao',
		'link',
		'icone'
	];

}