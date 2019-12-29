<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1555355681975DepartamentosTable extends Migration
{
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('departamento');
            $table->smallInteger('andar');
            $table->smallInteger('sala');
            $table->string('objetivo');
        });
    }

    public function down()
    {
        Schema::dropIfExists('departamentos');
    }
}
