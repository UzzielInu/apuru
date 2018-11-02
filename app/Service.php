<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  public function ticket()
    {
      return $this->belongsTo('App\Ticket', 'id');
    }
}
