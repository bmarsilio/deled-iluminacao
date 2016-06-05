<?php

namespace Iluminacao\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contato extends Model {

	protected $table = 'il_contato';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = [
		'deleted_at'
	];

	protected $fillable = [
		'nome',
		'email',
		'telefone',
		'mensagem'
	];

	protected $visible = [
		'nome',
		'email',
		'telefone',
		'mensagem'
	];

}