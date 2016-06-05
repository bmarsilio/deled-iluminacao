<?php

namespace Iluminacao\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model {

	protected $table = 'il_banner';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = [
		'deleted_at'
	];

	protected $fillable = [
		'ativo',
		'extensao',
		'ordem'
	];

	protected $visible = [
		'ativo',
		'extensao',
		'ordem'
	];

}