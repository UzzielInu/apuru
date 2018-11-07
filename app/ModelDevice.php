<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelDevice extends Model
{
  protected $table = 'model_devices';
  protected $guarded = ['id'];
  protected $fillable = ['marca','modelo'];

  public function devices()
    {
        return $this->hasMany('App\Device');
    }
}
