<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public function order_type()
  {
     return $this->belongsTo(OrderType::class);
  }

  public function cars()
  {
    return $this->belongsToMany(Car::class);
  }

  public function user()
  {
     return $this->belongsTo(User::class);
  }

  public function client()
  {
     return $this->belongsTo(Client::class);
  }
}
