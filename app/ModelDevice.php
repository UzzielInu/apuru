<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelDevice extends Model
{
  use SoftDeletes;

  protected $table = 'model_devices';
  protected $guarded = ['id'];
  protected $fillable = ['marca','modelo'];

  public function devices()
    {
        return $this->hasMany('App\Device');
    }
}
