<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model 
{
 
    protected $fillable = array('name');

    public function cities()
    {
    	return $this->hasMany(City::class);
    }
  
}