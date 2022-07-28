<?php

use App\Models\File;
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
            $table->string('tipo');
            $table->string('nome');
            $table->string('password', 100)->nullable();
            $table->string('dataNascimento');
            $table->string('genero');
            $table->string('cpf');
            $table->string('email')->unique();
            $table->string('rg');
            $table->string('celular');
            $table->string('telefone_residencial')->nullable();
            $table->string('endereco');
            $table->string('nmrEndereco');
            $table->string('complemento')->nullable();
            $table->string('cep');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');
            $table->string('profissao')-> nullable();
            $table->string('condicao');
            $table->string('grauParentesco')->nullable();
            $table->string('outro')->nullable();
            $table->string('pagamento')->nullable();
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
