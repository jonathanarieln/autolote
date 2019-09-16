<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

     protected $fillable = ['first_name','surname', 'birthdate', 'phone_number', 'gender_id','identification_number'];

     public function users()
     {
       return $this->hasMany(User::class);
     }

     public function clients()
     {
       return $this->hasMany(Client::class);
     }

     public function gender()
     {
        return $this->belongsTo(Gender::class);
     }
}
