<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
  use SoftDeletes;

  protected $table    = 'Locations';
  protected $guarded  = ['id'];
  protected $fillable = ['campus','edificio','departamento','nivel','areaTrabajo'];
  protected $dates = ['deleted_at'];

  public function devices()
    {
        return $this->hasMany('App\Device');
    }

  public function houseHolders()
    {
        return $this->hasMany('App\HouseHolder');
    }
}
