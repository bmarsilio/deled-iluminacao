<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIlItemHomeTable extends Migration
{
    public function up()
    {
        Schema::create('il_item_home', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('descricao');
            $table->text('resumo');
        });
    }

    public function down()
    {
        Schema::drop('il_item_home');
    }
}
