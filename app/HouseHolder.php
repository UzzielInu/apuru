<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HouseHolder extends Model
{

  use SoftDeletes;

  protected $table = 'house_holders';
  protected $guarded = ['id'];
  protected $fillable = ['nombre','paterno','materno','extension','correo','location_id','created_at'];
  protected $dates = ['deleted_at'];

  // public function setnombreAttribute($value)
  // {
  //     $this->attributes['nombre'] = strtoupper($value);
  // }

  public function location()
    {
      return $this->belongsTo('App\Location');
    }
}
