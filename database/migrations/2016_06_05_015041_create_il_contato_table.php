<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIlContatoTable extends Migration
{
    public function up()
    {
        Schema::create('il_contato', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->text('nome')->nullable();
            $table->text('email')->nullable();
            $table->text('telefone')->nullable();
            $table->text('mensagem')->nullable();
        });
    }

    public function down()
    {
        Schema::drop('il_contato');
    }
}
