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
			$table->foreign('eixo_id')->references('id')->on('eixos')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('escolhas', function(Blueprint $table) {
			$table->foreign('prop1')->references('id')->on('propostas')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('escolhas', function(Blueprint $table) {
			$table->foreign('prop2')->references('id')->on('propostas')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('escolhas', function(Blueprint $table) {
			$table->foreign('prop3')->references('id')->on('propostas')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('escolhas', function(Blueprint $table) {
			$table->foreign('prop4')->references('id')->on('propostas')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('escolhas', function(Blueprint $table) {
			$table->foreign('prop5')->references('id')->on('propostas')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('escolhas', function(Blueprint $table) {
			$table->foreign('prop6')->references('id')->on('propostas')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('escolhas', function(Blueprint $table) {
			$table->foreign('prop7')->references('id')->on('propostas')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('escolhas', function(Blueprint $table) {
			$table->foreign('prop8')->references('id')->on('propostas')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('escolhas', function(Blueprint $table) {
			$table->foreign('prop9')->references('id')->on('propostas')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('escolhas', function(Blueprint $table) {
			$table->foreign('prop10')->references('id')->on('propostas')
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
			$table->dropForeign('escolhas_eixo_id_foreign');
		});
		Schema::table('escolhas', function(Blueprint $table) {
			$table->dropForeign('escolhas_prop1_foreign');
		});
		Schema::table('escolhas', function(Blueprint $table) {
			$table->dropForeign('escolhas_prop2_foreign');
		});
		Schema::table('escolhas', function(Blueprint $table) {
			$table->dropForeign('escolhas_prop3_foreign');
		});
		Schema::table('escolhas', function(Blueprint $table) {
			$table->dropForeign('escolhas_prop4_foreign');
		});
		Schema::table('escolhas', function(Blueprint $table) {
			$table->dropForeign('escolhas_prop5_foreign');
		});
		Schema::table('escolhas', function(Blueprint $table) {
			$table->dropForeign('escolhas_prop6_foreign');
		});
		Schema::table('escolhas', function(Blueprint $table) {
			$table->dropForeign('escolhas_prop7_foreign');
		});
		Schema::table('escolhas', function(Blueprint $table) {
			$table->dropForeign('escolhas_prop8_foreign');
		});
		Schema::table('escolhas', function(Blueprint $table) {
			$table->dropForeign('escolhas_prop9_foreign');
		});
		Schema::table('escolhas', function(Blueprint $table) {
			$table->dropForeign('escolhas_prop10_foreign');
		});
    }
}
