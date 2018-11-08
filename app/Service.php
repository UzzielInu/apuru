<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
  use SoftDeletes;

  protected $table    = 'services';
  protected $guarded  = ['id'];
  protected $fillable = ['nombre','descripcion','tipo'];
  protected $dates = ['deleted_at'];

  public function ticket()
    {
      return $this->belongsTo('App\Ticket', 'id');
    }
}
