<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempImageTable extends Migration
{
    public function up()
    {
        Schema::create('temp_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->text('file')->nullable();
            $table->string('identify');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('temp_images');
    }
}
