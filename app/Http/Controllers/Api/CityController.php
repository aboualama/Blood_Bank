<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\Governorate;
use App\Models\City; 

class CityController extends Controller
{  
     
    public function city(request $request)
    { 
	    	$city = City::where(function($query) use($request)
    	    	{ 
    	    		if($request->has('governorate_id')) 
    	    		{
    	    			$query->where('governorate_id' , $request->governorate_id);
    	    		} 
    	    	})->with('governorate' , 'client')->paginate(10);

        return responsejson(1 , 'ok' , $city); 
    }
 

}
 
 