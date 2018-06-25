<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContribuicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contribuicoes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nome', 255);
			$table->string('email', 255);
			$table->string('telefone', 255);
			$table->string('cidade', 255);
			$table->integer('area')->unsigned();
			$table->text('sugestao');
			$table->integer('visivel')->default(false);
			$table->string('ordem', 3)->default('0');
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
        Schema::drop('contribuicoes');
    }
}
