<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
  public $timestamps = false;
  public function Genres()
  {
    return $this->belongsToMany('App\Genre');
  }
}
