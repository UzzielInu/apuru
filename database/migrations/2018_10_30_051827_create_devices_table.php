<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('noSerie', 25);
            $table->string('noInventario', 10);
            $table->string('dirIp', 15 );
            $table->string('dirMac', 18);
            $table->string('observaciones', 70);
            $table->unsignedInteger('operative_system_id');
            $table->foreign('operative_system_id')->references('id')->on('operative_systems');
            $table->unsignedInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types');
            $table->unsignedInteger('antivirus_id');
            $table->foreign('antivirus_id')->references('id')->on('antiviri');
            $table->unsignedInteger('model_device_id');
            $table->foreign('model_device_id')->references('id')->on('model_devices');
            $table->unsignedInteger('house_holder_id');
            $table->foreign('house_holder_id')->references('id')->on('house_holders');
            $table->unsignedInteger('location_id');
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
        Schema::dropIfExists('devices');
    }
}
