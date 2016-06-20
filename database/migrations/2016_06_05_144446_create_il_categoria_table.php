<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIlCategoriaTable extends Migration
{
    public function up()
    {
        Schema::create('il_categoria', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->text('descricao');
            $table->text('resumo')->nullable();
        });
    }

    public function down()
    {
        Schema::drop('il_categoria');
    }
}
