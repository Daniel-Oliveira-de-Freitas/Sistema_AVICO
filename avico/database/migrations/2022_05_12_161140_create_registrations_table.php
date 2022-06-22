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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            // $table->string('cidade', 100);
            // $table->string('estado', 100);
            $table->string('cpf');
            $table->date('dataNascimento');
            $table->string('email', 100)->unique();
            $table->string('genero', 50);
            $table->string('password', 100)->nullable();
            // $table->string('telefone', 100);
            // $table->string('profissao', 100);
            // $table->string('motivo', 10000);
            // $table->string('voluntario', 100);
            // $table->string('condicoes', 100);
            $table->string('updated_at');
            $table->string('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrations_table');
    }
};
