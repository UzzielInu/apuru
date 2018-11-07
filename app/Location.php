<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
  protected $table    = 'Locations';
  protected $guarded  = ['id'];
  protected $fillable = ['campus','edificio','departamento','nivel','areaTrabajo'];

  public function devices()
    {
        return $this->hasMany('App\Device');
    }

  public function houseHolders()
    {
        return $this->hasMany('App\HouseHolder');
    }
}
