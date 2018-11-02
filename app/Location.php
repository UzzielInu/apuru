<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
  public function devices()
    {
        return $this->hasMany('App\Device');
    }

  public function houseHolders()
    {
        return $this->hasMany('App\HouseHolder');
    }
}
