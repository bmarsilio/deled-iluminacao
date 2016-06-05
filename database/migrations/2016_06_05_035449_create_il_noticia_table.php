<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIlNoticiaTable extends Migration
{
    public function up()
    {
        Schema::create('il_noticia', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('titulo');
            $table->text('conteudo');
        });
    }

    public function down()
    {
        Schema::drop('il_noticia');
    }
}
