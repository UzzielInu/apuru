<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
  public function device()
    {
        return $this->hasOne('App\Device', 'id');
    }

  public function service()
    {
        return $this->hasOne('App\Service', 'id');
    }
}
