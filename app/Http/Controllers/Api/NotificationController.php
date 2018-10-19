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

        if($request->has('blood_type'))
        {
            $user->notification_blood()->sync($request->blood_type) ;       
        } 

        if ($request->has('city_id')) 
        {
            $user->notification_city()->sync($request->city_id) ;       
        }  

        return responsejson(1 , 'OK' , [
                                        'Blood' => $user->notification_blood()->pluck('name') ,
                                        'City'  => $user->notification_city()->pluck('name') ,
                                        ]);  
    }        
           
}
