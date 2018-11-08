<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
  use SoftDeletes;
  
  protected $table = 'types';
  protected $guarded  = ['id'];
  protected $fillable = ['nombre'];
  protected $dates = ['deleted_at'];

  public function devices()
    {
        return $this->hasMany('App\Device');
    }
}
