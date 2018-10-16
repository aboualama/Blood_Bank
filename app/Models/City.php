<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{
 
    protected $fillable = ['name', 'governorate_id'];

    

    public function governorate()
    {
    	return $this->belongsTo(Governorate::class);
    }
 

    public function client()
    {
    	return $this->hasMany(Client::class);
    }
 

    public function DonationRequest()
    {
    	return $this->hasMany(DonationRequest::class);
    }
  

}