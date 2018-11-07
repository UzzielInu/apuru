<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
  protected $table = 'types';
  public function devices()
    {
        return $this->hasMany('App\Device');
    }
}
