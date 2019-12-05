<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lancamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'lancamentos',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('tipo');
                $table->string('quantidade');
                $table->unsignedBigInteger('produto_id');
                $table->foreign('produto_id')->references('id')->on('produtos');               
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
