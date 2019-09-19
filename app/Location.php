<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
  public function cars()
  {
    return $this->hasMany(Car::class);
  }
  
  public function temp_cars()
  {
    return $this->hasMany(TempCar::class);
  }
}
