<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{

  protected $fillable = ['car_id', 'movement_name', 'available'];

  public function cars()
  {
    return $this->hasMany(Car::class);
  }
}
