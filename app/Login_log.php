<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login_log extends Model
{
  protected $table    = 'login_logs';
  protected $guarded  = ['id'];
  protected $fillable = ['user_id', 'type'];

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
