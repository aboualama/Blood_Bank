<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{
 
    protected $fillable = 
    						['client_id', 'patient_name', 'patient_age', 'blood_type', 'bags_num', 'hospital_name', 'hospital_address', 'city_id', 
    						 'phone', 'notes', 'latitude', 'longitude'];




    public function city()
    {
    	return $this->belongsTo(City::class);
    }

    public function client()
    {
    	return $this->belongsTo(client::class);
    }



  
}