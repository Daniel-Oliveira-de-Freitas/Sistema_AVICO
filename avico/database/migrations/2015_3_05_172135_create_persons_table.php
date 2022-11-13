<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nome_completo');
            $table->date('data_nascimento');
            $table->string('genero', 50);
            $table->string('raca_cor', 50);
            $table->string('cpf', 15)->unique();
            $table->string('rg', 15);
            $table->bigInteger('telefone');
            $table->bigInteger('telefone_residencial')->nullable();
            $table->string('profissao')->nullable();
            $table->string('tipo_pagamento')->nullable();
            $table->boolean('declaracao_isencao')->default(false);
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persons');
    }
};
