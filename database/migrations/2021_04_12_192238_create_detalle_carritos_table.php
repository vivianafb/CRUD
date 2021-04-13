<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleCarritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_carritos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carritos_id');
            $table->foreign('carritos_id')->references('id')->on('carritos');
            $table->unsignedBigInteger('series_id');
            $table->foreign('series_id')->references('id')->on('series');
            $table->string('precio');
            $table->integer('cantidad');
            $table->integer('estado');
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
        Schema::dropIfExists('detalle_carritos');
    }
}
