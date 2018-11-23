<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('observaciones', 70);
            $table->string('prioridad', 25);
            $table->string('cliente', 20);
            $table->string('estado', 15);
            $table->unsignedInteger('device_id');
            $table->foreign('device_id')->references('id')->on('devices');
            $table->unsignedInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
