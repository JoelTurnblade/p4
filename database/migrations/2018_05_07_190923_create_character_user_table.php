<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterUserTable extends Migration
{
    public function up()
    {
        Schema::create('character_user', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('user_id')->unsigned();
            $table->integer('character_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('character_id')->references('id')->on('characters');

        });
    }

    public function down()
    {
        Schema::dropIfExists('character_user');
    }
}
