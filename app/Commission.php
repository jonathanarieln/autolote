<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $fillable = ['id','value', 'commission'];
}
