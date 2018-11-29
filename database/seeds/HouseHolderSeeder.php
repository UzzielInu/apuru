<?php

use Illuminate\Database\Seeder;
use App\HouseHolder;

class HouseHolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $householder= new HouseHolder;
      $householder->nombre = 'Ninfa';
      $householder->paterno = 'Portilla';
      $householder->materno = 'Loeza';
      $householder->extension = '4314';
      $householder->correo = 'ninfa.portilla@inecol.mx';
      $householder->location_id = '1';
      $householder->save();
    }
}
