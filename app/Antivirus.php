<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antivirus extends Model
{
  protected $table = 'antiviri';
  public function devices()
    {
        return $this->hasMany('App\Device');
    }
}
