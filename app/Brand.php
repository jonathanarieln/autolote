<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
  public function modelos()
  {
    return $this->hasMany(Modelo::class);
  }
  public function cars()
  {
    return $this->hasMany(Car::class);
  }
  public function temp_cars()
  {
    return $this->hasMany(TempCar::class);
  }
}
