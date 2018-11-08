<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseHoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_holders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 25);
            $table->string('paterno', 20);
            $table->string('materno', 20);
            $table->string('extension', 4);
            $table->string('correo', 35);
            $table->unsignedInteger('location_id')->unique();
            $table->foreign('location_id')->references('id')->on('locations');
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
        Schema::dropIfExists('house_holders');
    }
}
