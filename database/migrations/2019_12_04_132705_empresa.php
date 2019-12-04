<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('nome_fantasia');
                $table->string('razao_social');
                $table->string('cnpj');
                $table->string('cep');
                $table->string('logradouro');
                $table->string('bairro');
                $table->string('numero');
                $table->string('complemento');
                $table->string('cidade');
                $table->string('uf');
                $table->string('categoria');
                $table->string('imagem');
                $table->enum('status', ['A', 'I', 'C']); //A= Ativa | I= Inativa | C = Cancelada
                $table->string('email');
                $table->string('website');
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
