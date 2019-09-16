<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Legal extends Model
{

  protected $fillable = ['legal_name','contact_name', 'contact_phone_number'];

  public function clients()
  {
    return $this->hasMany(Client::class);
  }
}
