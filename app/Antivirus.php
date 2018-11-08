<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Antivirus extends Model
{
  use SoftDeletes;

  protected $table = 'antiviri';
  protected $guarded = ['id'];
  protected $fillable = ['nombre','version'];
  protected $dates = ['deleted_at'];


  public function devices()
    {
        return $this->hasMany('App\Device');
    }
}
