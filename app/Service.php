<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  protected $table    = 'services';
  protected $guarded  = ['id'];
  protected $fillable = ['nombre','descripcion','tipo'];

  public function ticket()
    {
      return $this->belongsTo('App\Ticket', 'id');
    }
}
