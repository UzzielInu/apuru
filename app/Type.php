<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
  protected $table = 'types';
  protected $guarded  = ['id'];
  protected $fillable = ['nombre'];
  public function devices()
    {
        return $this->hasMany('App\Device');
    }
}
