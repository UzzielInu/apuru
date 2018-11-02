<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HouseHolder extends Model
{
  public function location()
    {
        return $this->belongsTo('App\Location');
    }
}
