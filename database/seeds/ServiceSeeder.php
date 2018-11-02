<?php

use Illuminate\Database\Seeder;
use App\Service;
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Soporte conectividad (1)
      $service= new Service;
      $service->nombre = 'Problemas de conectivda';
      $service->descripcion = 'Fallas relacionadas con la red ';
      $service->tipo = '1';
      $service->save();
      //Soporte fallas hardware(1)
      $service= new Service;
      $service->nombre = 'Fallas de hardware';
      $service->descripcion = 'Fallas relacionadas con componentes de los equipos';
      $service->tipo = '1';
      $service->save();
      //Soporte fallas software (1)
      $service= new Service;
      $service->nombre = 'Fallas de software';
      $service->descripcion = 'Fallas relacionadas con los programas de los equipos ';
      $service->tipo = '1';
      $service->save();  
    }
}
