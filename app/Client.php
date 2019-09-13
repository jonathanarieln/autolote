<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  public function legal()
  {
     return $this->belongsTo(Legal::class);
  }

  public function person()
  {
     return $this->belongsTo(Person::class);
  }
}
