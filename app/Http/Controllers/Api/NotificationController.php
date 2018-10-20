<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;  
use App\Models\Client; 



class NotificationController extends Controller
{   

    public function notification (request $request) 
    { 

        $api_token = $request->api_token; 
        $user =  Client::where('api_token' , $api_token)->first();    



        $blood = $user->notification_blood(); 

        $notiblood = ($request->has('blood_type')) ? $blood->sync($request->blood_type) : $blood->detach($request->blood_type) ;  


        $city = $user->notification_city(); 

        $noticity = ($request->has('city_id')) ? $city->sync($request->city_id) : $city->detach($request->city_id) ;  

 
        return responsejson(1 , 'OK' , [
                                        'Blood' => $blood->pluck('name') ,
                                        'City'  => $city->pluck('name') ,
                                        ]);  
    }        
           
}
