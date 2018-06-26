<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('propostas', function(Blueprint $table) {
			$table->foreign('eixo_id')->references('id')->on('eixos')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('prioridades', function(Blueprint $table) {
			$table->foreign('proposta_id')->references('id')->on('propostas')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('contribuicoes', function(Blueprint $table) {
			$table->foreign('area')->references('id')->on('eixos')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('escolhas', function(Blueprint $table) {
			$table->foreign('prioridade_id')->references('id')->on('prioridades')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('propostas', function(Blueprint $table) {
			$table->dropForeign('propostas_eixos_id_foreign');
		});
		Schema::table('prioridades', function(Blueprint $table) {
			$table->dropForeign('prioridades_propostas_id_foreign');
		});
		Schema::table('contribuicoes', function(Blueprint $table) {
			$table->dropForeign('contribuicoes_area_foreign');
		});
		Schema::table('escolhas', function(Blueprint $table) {
			$table->dropForeign('escolhas_prioridades_id_foreign');
		});
    }
}
