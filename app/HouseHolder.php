<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HouseHolder extends Model
{
  protected $table = 'house_holders';
  protected $guarded = ['id'];
  protected $fillable = ['nombre','paterno','materno','extension','correo','location_id','created_at'];

  // public function setnombreAttribute($value)
  // {
  //     $this->attributes['nombre'] = strtoupper($value);
  // }

  public function location()
    {
      return $this->belongsTo('App\Location');
    }
}
