<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
  public function os()
    {
      return $this->belongsTo('App\OperativeSystem', 'operative_system_id', 'id');
    }

  public function type()
    {
      return $this->belongsTo('App\Type');
    }

  public function antivirus()
    {
      return $this->belongsTo('App\Antivirus');
    }

  public function modelDevice()
    {
      return $this->belongsTo('App\ModelDevice');
    }

  public function location()
    {
      return $this->belongsTo('App\Location');
    }

  public function ticket()
    {
      return $this->belongsTo('App\Ticket');
    }
}
