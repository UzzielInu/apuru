<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
<<<<<<< HEAD
=======

>>>>>>> c6d4eeb989d3d62543d6a7d04b462a375f02bded
  protected $table    = 'devices';
  protected $guarded  = ['id'];
  protected $fillable = ['noSerie',
                          'noInventario',
                          'dirIp',
                          'dirMac',
                          'observaciones',
                          'operative_system_id',
                          'type_id','antivirus_id',
                          'model_device_id',
                          'house_holder_id',
                          'location_id'
                        ];
  protected $dates    = ['deleted_at'];

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
