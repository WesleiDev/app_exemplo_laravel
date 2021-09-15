<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteressadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interessados', function (Blueprint $table) {
            $table->id();
            $table->string('email', 200);
            $table->unsignedBigInteger('bolo_id');
            $table->boolean('email_enviado')->default(false);
            $table->timestamps();

            $table->foreign('bolo_id')->references('id')->on('bolos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interessados');
    }
}
