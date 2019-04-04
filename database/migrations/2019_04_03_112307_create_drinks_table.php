<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drinks', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->string('description');
          $table->unsignedInteger('price');
          $table->unsignedBigInteger('menu_id');
          $table->timestamps();

          $table->foreign('menu_id')->references('id')->on('menu')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drinks');
    }
}
