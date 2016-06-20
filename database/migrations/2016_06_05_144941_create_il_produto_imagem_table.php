<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIlProdutoImagemTable extends Migration
{
    public function up()
    {
        Schema::create('il_produto_imagem', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('produto_id')->unsigned();
            $table->string('extensao');

            $table->foreign('produto_id')->references('id')->on('il_produto');
        });
    }

    public function down()
    {
        Schema::drop('il_produto_imagem');
    }
}
