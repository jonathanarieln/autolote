<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
  public function cars()
  {
    return $this->hasMany(Car::class);
  }
}
