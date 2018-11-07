<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperativeSystem extends Model
{
  protected $table = 'operative_systems';
  protected $guarded = ['id'];
  protected $fillable = ['nombre','version'];
  
  public function devices()
    {
        return $this->hasMany('App\Device');
    }
}
