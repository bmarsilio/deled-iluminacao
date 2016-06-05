<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIlItemHomeImagemTable extends Migration
{
    public function up()
    {
        Schema::create('il_item_home_imagem', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('item_home_id')->unsigned();
            $table->string('extensao');

            $table->foreign('item_home_id')->references('id')->on('il_item_home');
        });
    }

    public function down()
    {
        Schema::drop('il_item_home_imagem');
    }
}
