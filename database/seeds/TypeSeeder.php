<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Desktop
      $type = new Type;
      $type->nombre = 'Desktop';
      $type->save();
      //Laptop
      $type = new Type;
      $type->nombre = 'Laptop';
      $type->save();
      //Smartphone
      $type = new Type;
      $type->nombre = 'Smartphone';
      $type->save();
      //Telefono IP
      $type = new Type;
      $type->nombre = 'Telefono IP';
      $type->save();
      //Tablet
      $type = new Type;
      $type->nombre = 'Tablet';
      $type->save();
      //Impresora
      $type = new Type;
      $type->nombre = 'Impresora';
      $type->save();
      //Router
      $type = new Type;
      $type->nombre = 'Router';
      $type->save();
      //Switch
      $type = new Type;
      $type->nombre = 'Switch';
      $type->save();
      //Access point
      $type = new Type;
      $type->nombre = 'Access point';
      $type->save();
      //Secuenciador
      $type = new Type;
      $type->nombre = 'Secuenciador';
      $type->save();
      //Servidor
      $type = new Type;
      $type->nombre = 'Servidor';
      $type->save();
    }
}
