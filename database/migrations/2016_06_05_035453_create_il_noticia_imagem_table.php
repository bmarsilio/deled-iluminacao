<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIlNoticiaImagemTable extends Migration
{
    public function up()
    {
        Schema::create('il_noticia_imagem', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('noticia_id')->unsigned();
            $table->string('extensao');

            $table->foreign('noticia_id')->references('id')->on('il_noticia');
        });
    }

    public function down()
    {
        Schema::drop('il_noticia_imagem');
    }
}
