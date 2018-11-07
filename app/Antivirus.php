<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antivirus extends Model
{
  protected $table = 'antiviri';
  protected $guarded = ['id'];
  protected $fillable = ['nombre','version'];
  
  public function devices()
    {
        return $this->hasMany('App\Device');
    }
}
