<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaAlunos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table)
        {
            $table->bigIncrements('ra');
            $table->string('nome', 191)->nullable(false);
            $table->string('email', 191)->nullable(false)->unique();
            $table->string('cpf', 11)->nullable(false)->unique();
            $table->string('celular', 14)->nullable(false);
            $table->enum('genero', ['masculino', 'femenino'])->nullable(false);
            $table->date('data_nascimento')->nullable(false);
            $table->enum('status', ['ativo', 'aguardando', 'trancado', 'desistente', 'tranferido'])->nullable(false);
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos');

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
        Schema::dropIfExists('alunos');
    }
}
