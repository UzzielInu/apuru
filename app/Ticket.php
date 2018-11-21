<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
  use SoftDeletes;
  
  protected $table = 'tickets';
  protected $guarded  = ['id'];
  protected $fillable = ['observaciones','prioridad','cliente','device_id','service_id','created_at','upupdated_at'];
  protected $dates = ['deleted_at'];

  public function device()
    {
        return $this->hasOne('App\Device', 'id');
    }

  public function service()
    {
        return $this->hasOne('App\Service', 'id');
    }
}
