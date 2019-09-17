<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  protected $fillable = ['is_legal','RTN','person_id','legal_id'];

  public function legal()
  {
     return $this->belongsTo(Legal::class);
  }

  public function person()
  {
     return $this->belongsTo(Person::class);
  }

  public function orders()
  {
    return $this->hasMany(Order::class);
  }
}
