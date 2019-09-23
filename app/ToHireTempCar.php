<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToHireTempCar extends Model
{
  protected $fillable = ['car_id' ,'user_id'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function car()
  {
    return $this->belongsTo(Car::class);
  }
}
