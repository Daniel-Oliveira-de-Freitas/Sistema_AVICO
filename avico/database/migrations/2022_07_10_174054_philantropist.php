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
        Schema::create('philanthropist', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('person_id');
            $table->enum('paymentType', ['pix', 'deposito']);
            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('person')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('philanthropist');
        
    }
};
