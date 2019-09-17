<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
  public function cars()
  {
    return $this->hasMany(Car::class);
  }
}
