<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Servico extends Migration
{
    
    public function up()
    {
        Schema::create(
            'servicos',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('categoria');
                $table->string('descricao');
                $table->timestamps();
            }
        );
    }

    
    public function down()
    {
        //
    }
}
