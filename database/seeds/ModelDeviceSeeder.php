<?php

use Illuminate\Database\Seeder;
use App\ModelDevice;

class ModelDeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Dell optiplex
      $model= new ModelDevice;
      $model->marca = 'Dell';
      $model->modelo = 'Optiplex';
      $model->save();
      //Dell Dimemsion
      $model= new ModelDevice;
      $model->marca = 'Dell';
      $model->modelo = 'Dimemsion';
      $model->save();
      //Dell Inspirion
      $model= new ModelDevice;
      $model->marca = 'Dell';
      $model->modelo = 'Inspiron';
      $model->save();
      //Dell Presicion
      $model= new ModelDevice;
      $model->marca = 'Dell';
      $model->modelo = 'Presicion';
      $model->save();
      //Dell Vostro
      $model= new ModelDevice;
      $model->marca = 'Dell';
      $model->modelo = 'Vostro';
      $model->save();
      //Dell Xps
      $model= new ModelDevice;
      $model->marca = 'Dell';
      $model->modelo = 'Xps';
      $model->save();
      //Acer	Aspire
      $model= new ModelDevice;
      $model->marca = 'Acer';
      $model->modelo = 'Aspire';
      $model->save();
      //Acer	Z3770
      $model= new ModelDevice;
      $model->marca = 'Acer';
      $model->modelo = 'Z3770';
      $model->save();
      //Apple	Imac
      $model= new ModelDevice;
      $model->marca = 'Apple';
      $model->modelo = 'Imac';
      $model->save();
      //Hp	P6100la
      $model= new ModelDevice;
      $model->marca = 'Hp';
      $model->modelo = 'P6100la';
      $model->save();
      //Hp	D330
      $model= new ModelDevice;
      $model->marca = 'Hp';
      $model->modelo = 'D330';
      $model->save();
      //Hp	All in one
      $model= new ModelDevice;
      $model->marca = 'Hp';
      $model->modelo = 'All in one';
      $model->save();
      //Hp	Pavilion
      $model= new ModelDevice;
      $model->marca = 'Hp';
      $model->modelo = 'Pavilion';
      $model->save();
      //Lenovo	ThinkCenter
      $model= new ModelDevice;
      $model->marca = 'Lenovo';
      $model->modelo = 'ThinkCenter';
      $model->save();
      //Lenovo	ThinkCenter M900
      $model= new ModelDevice;
      $model->marca = 'Lenovo';
      $model->modelo = 'ThinkCenter M900';
      $model->save();
      //Illumina	Miseq
      $model= new ModelDevice;
      $model->marca = 'Illumina';
      $model->modelo = 'Miseq ';
      $model->save();
      //Illumina	Nextseq 550
      $model= new ModelDevice;
      $model->marca = 'Illumina';
      $model->modelo = 'Nextseq 550 ';
      $model->save();

    }
}
