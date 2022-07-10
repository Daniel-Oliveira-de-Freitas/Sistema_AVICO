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
        Schema::create('endereco', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pessoa_id');
            $table->string('rua');
            $table->string('nmrEndereco');
            $table->string('complemento')->nullable();
            $table->string('cep', 9);
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->timestamps();

            $table->foreign('pessoa_id')
            ->references('id')->on('person')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('endereco');
    }
};
