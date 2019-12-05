<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produtos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'produtos',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('descricao');
                $table->string('valor');
                $table->unsignedBigInteger('fabricante_id');
                $table->foreign('fabricante_id')->references('id')->on('fabricantes');               
                $table->text('informacoes');
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
