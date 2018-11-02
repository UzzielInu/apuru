<?php

use Illuminate\Database\Seeder;
use App\Antivirus;

class AntivirusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Avast
      $antivirus= new Antivirus;
      $antivirus->nombre = 'Avast';
      $antivirus->version = 'Free';
      $antivirus->save();
      //Avast
      $antivirus= new Antivirus;
      $antivirus->nombre = 'Avast';
      $antivirus->version = 'Endpoint';
      $antivirus->save();
      //Avast
      $antivirus= new Antivirus;
      $antivirus->nombre = 'Avast';
      $antivirus->version = 'Pro';
      $antivirus->save();
      //Avast
      $antivirus= new Antivirus;
      $antivirus->nombre = 'Avast';
      $antivirus->version = 'Bussiness';
      $antivirus->save();
      //Avast
      $antivirus= new Antivirus;
      $antivirus->nombre = 'Avast';
      $antivirus->version = 'Free';
      $antivirus->save();
      //360
      $antivirus= new Antivirus;
      $antivirus->nombre = '360';
      $antivirus->version = 'Total security';
      $antivirus->save();
      //Bitdefender
      $antivirus= new Antivirus;
      $antivirus->nombre = 'Bitdefender';
      $antivirus->version = 'Free';
      $antivirus->save();
      //Panda
      $antivirus= new Antivirus;
      $antivirus->nombre = 'Panda';
      $antivirus->version = '';
      $antivirus->save();
      //Eset nod32
      $antivirus= new Antivirus;
      $antivirus->nombre = 'Eset nod32';
      $antivirus->version = '';
      $antivirus->save();
      //Total AV
      $antivirus= new Antivirus;
      $antivirus->nombre = 'Total AV';
      $antivirus->version = '';
      $antivirus->save();
      //Webroot
      $antivirus= new Antivirus;
      $antivirus->nombre = 'Webroot';
      $antivirus->version = '';
      $antivirus->save();
    }
}
