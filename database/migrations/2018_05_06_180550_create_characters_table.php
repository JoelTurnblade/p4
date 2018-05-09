<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration
{
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            $table->string('name');
            $table->string('race');
            $table->string('class');
            $table->integer('level');

            $table->integer('str');
            $table->integer('dex');
            $table->integer('con');
            $table->integer('int');
            $table->integer('wis');
            $table->integer('cha');

            $table->string('status');
            $table->integer('max_hp');
            $table->integer('current_hp');
            $table->integer('gold');
            $table->string('armor_name');
            $table->integer('armor_ac_bonus');
            $table->string('weapon_name');
            $table->integer('weapon_max_dmg');
            $table->boolean('ranged_weapon');

            

        });
    }

    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
