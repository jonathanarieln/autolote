<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
  public function People()
  {
    return $this->hasMany(Person::class);
  }
}
