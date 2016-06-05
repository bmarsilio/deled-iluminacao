<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIlProdutoTable extends Migration
{
    public function up()
    {
        Schema::create('il_produto', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('categoria_id')->unsigned();
            $table->string('titulo');
            $table->text('resumo')->nullable();

            $table->foreign('categoria_id')->references('id')->on('il_categoria');
        });
    }

    public function down()
    {
        Schema::drop('il_produto');
    }
}
