<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterContribuicoesAddDefaultVisivel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contribuicoes', function (Blueprint $table) {
            $table->integer('visivel')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contribuicoes', function (Blueprint $table) {
            $table->dropColumn('visivel');
        });
    }
}
