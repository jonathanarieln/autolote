<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
  public function brand()
  {
     return $this->belongsTo(Brand::class);
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
