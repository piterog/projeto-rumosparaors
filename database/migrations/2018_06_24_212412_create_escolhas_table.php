<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscolhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escolhas', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('eixo_id')->unsigned();
			$table->integer('prop1')->unsigned()->nullable();
			$table->integer('prop2')->unsigned()->nullable();
			$table->integer('prop3')->unsigned()->nullable();
			$table->integer('prop4')->unsigned()->nullable();
			$table->integer('prop5')->unsigned()->nullable();
			$table->integer('prop6')->unsigned()->nullable();
			$table->integer('prop7')->unsigned()->nullable();
			$table->integer('prop8')->unsigned()->nullable();
			$table->integer('prop9')->unsigned()->nullable();
            $table->integer('prop10')->unsigned()->nullable();
			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('escolhas');
    }
}
