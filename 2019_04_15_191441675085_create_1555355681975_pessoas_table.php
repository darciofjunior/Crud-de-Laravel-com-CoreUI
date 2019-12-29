<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1555355681975PessoasTable extends Migration
{
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 50);
            $table->date('data_contratacao');
            $table->string('cargo');
            $table->decimal('salario', 7, 2);
            $table->integer('ramal');
            $table->integer('departamento_id')->unsigned();
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}
