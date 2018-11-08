<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//It's used for logic-delete data.

class OperativeSystem extends Model
{
  use SoftDeletes;

  protected $table = 'operative_systems';
  protected $guarded = ['id'];
  protected $fillable = ['nombre','version'];
  protected $dates = ['deleted_at'];
  
  public function devices()
    {
        return $this->hasMany('App\Device');
    }
}
