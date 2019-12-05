<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->bigIncrements('id');
                $table->string('cep');
                $table->string('logradouro');
                $table->string('bairro');
                $table->string('numero');
                $table->string('complemento');
                $table->string('cidade');
                $table->string('uf');
                $table->integer('enderecoable_id');
                $table->string('enderecoable_type');
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
        Schema::dropIfExists('enderecos');
    }
}
