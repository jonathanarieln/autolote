<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempCar extends Model
{

  protected $fillable = ['plate', 'engine', 'chassis', 'year', 'price','color_id','brand_id','modelo_id','car_type_id','location_id','user_id'];

  public function color()
  {
     return $this->belongsTo(Color::class);
  }

  public function car_type()
  {
     return $this->belongsTo(CarType::class);
  }

  public function brand()
  {
     return $this->belongsTo(Brand::class);
  }

  public function modelo()
  {
     return $this->belongsTo(Modelo::class);
  }

  public function location()
  {
     return $this->belongsTo(Location::class);
  }

  public function orders()
  {
    return $this->belongsToMany(Order::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
