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

      $householder= new HouseHolder;
      $householder->nombre = 'Sandra';
      $householder->paterno = 'Rocha';
      $householder->materno = 'Ortíz';
      $householder->extension = '4353';
      $householder->correo = 'sandra.rocha@inecol.mx';
      $householder->location_id = '1';
      $householder->save();

      $householder= new HouseHolder;
      $householder->nombre = 'Maria de Lourdes';
      $householder->paterno = 'Cruz';
      $householder->materno = 'Huerta';
      $householder->extension = '4314';
      $householder->correo = 'lourdes.cruz@inecol.mx';
      $householder->location_id = '1';
      $householder->save();

      $householder= new HouseHolder;
      $householder->nombre = 'Juan Carlos';
      $householder->paterno = 'Serio';
      $householder->materno = 'Silva';
      $householder->extension = '4109';
      $householder->correo = 'juan.serio@inecol.mx';
      $householder->location_id = '2';
      $householder->save();

      $householder= new HouseHolder;
      $householder->nombre = 'Diego';
      $householder->paterno = 'Santiago';
      $householder->materno = 'Alarcón';
      $householder->extension = '4142';
      $householder->correo = 'diego.santiago@inecol.mx';
      $householder->location_id = '3';
      $householder->save();

      $householder= new HouseHolder;
      $householder->nombre = 'Maria';
      $householder->paterno = 'Susana';
      $householder->materno = 'Barrientos';
      $householder->extension = '';
      $householder->correo = 'susana.alvarado@inecol.mx';
      $householder->location_id = '4';
      $householder->save();

      $householder= new HouseHolder;
      $householder->nombre = 'Dolores
      ';$householder->paterno = 'González
      ';$householder->materno = 'Hernández
      ';$householder->extension = '3108
      ';$householder->correo = 'dolores.gonzalez@inecol.mx';
      $householder->location_id = '5';
      $householder->save();

      $householder= new HouseHolder;
      $householder->nombre = 'Florencia Judith
      ';$householder->paterno = 'Ramírez
      ';$householder->materno = 'Guille
      ';$householder->extension = '3122
      ';$householder->correo = 'florencia.ramirez@inecol.mx';
      $householder->location_id = '5';
      $householder->save();

      $householder= new HouseHolder;
      $householder->nombre = 'Daniel
      ';$householder->paterno = 'Reynoso
      ';$householder->materno = 'Velasco
      ';$householder->extension = '3304
      ';$householder->correo = 'daniel.reynoso@inecol.mx';
      $householder->location_id = '5';
      $householder->save();

      $householder= new HouseHolder;
      $householder->nombre = 'Santiago
      ';$householder->paterno = 'Chacón
      ';$householder->materno = 'Zapata
      ';$householder->extension = '3114
      ';$householder->correo = 'santiago.chacon@inecol.mx';
      $householder->location_id = '5';
      $householder->save();

      $householder= new HouseHolder;
      $householder->nombre = 'Elsa María
      ';$householder->paterno = 'Utrera
      ';$householder->materno = 'Barillas
      ';$householder->extension = '3101
      ';$householder->correo = 'elsa.utrera@inecol.edu.mx';
      $householder->location_id = '5';
      $householder->save();

      $householder= new HouseHolder;
      $householder->nombre = 'Efraín
      ';$householder->paterno = 'De Luna
      ';$householder->materno = 'García
      ';$householder->extension = '3105
      ';$householder->correo = 'efrain.deluna@inecol.mx';
      $householder->location_id = '5';
      $householder->save();

      $householder= new HouseHolder;
      $householder->nombre = 'Maria Elena
      ';$householder->paterno = 'Medina
      ';$householder->materno = 'Abreo
      ';$householder->extension = '3116
      ';$householder->correo = 'elena.medina@inecol.mx';
      $householder->location_id = '5';
      $householder->save();

      $householder= new HouseHolder;
      $householder->nombre = 'Gonzalo
      ';$householder->paterno = 'Castillo
      ';$householder->materno = 'Campo
      ';$householder->extension = '3106
      ';$householder->correo = 'gonzalo.castillo@inecol.mx';
      $householder->location_id = '5';
      $householder->save();

      $householder= new HouseHolder;
      $householder->nombre = 'María Teresa
    ';$householder->paterno = 'Suárez
    ';$householder->materno = 'Landa
    ';$householder->extension = '4360
    ';$householder->correo = 'teresa.suarez@inecol.mx';
      $householder->location_id = '6';
      $householder->save();

      $householder= new HouseHolder;
      $householder->nombre = 'Sergio
    ';$householder->paterno = 'Ibáñez
    ';$householder->materno = 'Bernal
    ';$householder->extension = '4112
    ';$householder->correo = 'sergio.ibañez@inecol.mx';
      $householder->location_id = '6';
      $householder->save();

      $householder= new HouseHolder;
      $householder->nombre = 'Rodolfo
    ';$householder->paterno = 'Novelo
    ';$householder->materno = 'Gutiérrez
    ';$householder->extension = '3311
    ';$householder->correo = 'rodolfo.novelo@inecol.mx';
      $householder->location_id = '7';
      $householder->save();

      $householder= new HouseHolder;
      $householder->nombre = 'Luis Liceforo
    ';$householder->paterno = 'Quiroz
    ';$householder->materno = 'Robleda
    ';$householder->extension = '3302
    ';$householder->correo = 'luis.quiroz@inecol.mx';
      $householder->location_id = '7';
      $householder->save();

      $householder= new HouseHolder;
      $householder->nombre = 'Martha María
    ';$householder->paterno = 'González
    ';$householder->materno = 'Aburto
    ';$householder->extension = '3101
    ';$householder->correo = 'martha.rodriguez@inecol.mx';
      $householder->location_id = '7';
      $householder->save();

      $householder= new HouseHolder;
      $householder->nombre = 'María Victoria
    ';$householder->paterno = 'Méndez
    ';$householder->materno = 'Olarte
    ';$householder->extension = '4401
    ';$householder->correo = 'victoria.mendez@inexol.mx';
      $householder->location_id = '7';
      $householder->save();

      $householder= new HouseHolder;
      $householder->nombre = 'Jose Antonio
    ';$householder->paterno = 'Ángeles
    ';$householder->materno = 'Varela
    ';$householder->extension = '4408
    ';$householder->correo = 'antonio.angeles@inecol.mx';
      $householder->location_id = '7';
      $householder->save();






    }
}
