<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIlBannerTable extends Migration
{
    public function up()
    {
        Schema::create('il_banner', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('ativo')->default(true);
            $table->string('extensao');
            $table->integer('ordem')->nullable();
        });
    }

    public function down()
    {
        Schema::drop('il_banner');
    }
}
