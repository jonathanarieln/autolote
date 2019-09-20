<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

  protected $fillable = ['client_id', 'user_id', 'order_type_id',"comments","value"];

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
