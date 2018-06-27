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
            $table->string('visivel',1)->default('n')->change();
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
