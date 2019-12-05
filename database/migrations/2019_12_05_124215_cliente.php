<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'clientes',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('nome');
                $table->string('tipo');
                $table->string('cpfcnpj');
                $table->string('imagem');
                $table->enum('status', ['Ativa', 'Inativa', 'Cancelada']);
                $table->string('email');
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
