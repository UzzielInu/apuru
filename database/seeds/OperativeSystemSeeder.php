<?php

use Illuminate\Database\Seeder;
use App\OperativeSystem;
class OperativeSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Windows
      $os          = new OperativeSystem;
      $os->nombre  = 'Windows';
      $os->version = 'XP';
      $os->save();
      $os          = new OperativeSystem;
      $os->nombre  = 'Windows';
      $os->version = 'Vista';
      $os->save();
      $os          = new OperativeSystem;
      $os->nombre  = 'Windows';
      $os->version = '7';
      $os->save();
      $os          = new OperativeSystem;
      $os->nombre  = 'Windows';
      $os->version = '8';
      $os->save();
      $os          = new OperativeSystem;
      $os->nombre  = 'Windows';
      $os->version = '8.1';
      $os->save();
      $os          = new OperativeSystem;
      $os->nombre  = 'Windows';
      $os->version = '10';
      $os->save();
      //Linux
      $os          = new OperativeSystem;
      $os->nombre  = 'Debian';
      $os->version = '9';
      $os->save();
      $os          = new OperativeSystem;
      $os->nombre  = 'Debian';
      $os->version = '8';
      $os->save();
      $os          = new OperativeSystem;
      $os->nombre  = 'Ubuntu';
      $os->version = '14.xx';
      $os->save();
      $os          = new OperativeSystem;
      $os->nombre  = 'Ubuntu';
      $os->version = '16.xx';
      $os->save();
      $os          = new OperativeSystem;
      $os->nombre  = 'Ubuntu';
      $os->version = '18.xx';
      $os->save();
      //MAC OS
      $os          = new OperativeSystem;
      $os->nombre  = 'MAC OS';
      $os->version = 'Snow Leopard';
      $os->save();
      $os          = new OperativeSystem;
      $os->nombre  = 'MAC OS';
      $os->version = 'Sierra';
      $os->save();
      $os          = new OperativeSystem;
      $os->nombre  = 'MAC OS';
      $os->version = 'Yosemite';
      $os->save();

    }
}
