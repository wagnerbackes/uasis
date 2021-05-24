<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('nome', 191)->nullable(false);
            $table->string('email', 191)->nullable(false)->unique();
            $table->string('login', 20)->nullable(false)->unique();
            $table->string('senha')->nullable(false);
            $table->enum('status', ['ativo', 'inativa']);
            $table->enum('tipo', ['administrador', 'usuario']);
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
        Schema::dropIfExists('usuarios');
    }
}
