<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIlRedeSocialTable extends Migration
{
    public function up()
    {
        Schema::create('il_rede_social', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('descricao');
            $table->text('link');
            $table->string('icone');
        });
    }

    public function down()
    {
        Schema::drop('il_rede_social');
    }
}
