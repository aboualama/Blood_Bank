<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;  
use App\Models\City;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
      

     
    public function register(Request $request)
    {
    	$data = $request->all(); 
    	$validator = validator()->make($data, [

			'name'               => 'required',
			'email'              => 'required|unique:clients',
			'birth_date'         => 'required',
			'city_id'            => 'required|numeric',
			'phone'              => 'required|numeric',
			'donation_last_date' => 'required',
			'blood_type'         => 'required|in:O-,O+,B-,B+,A+,A-,AB-,AB+',
			'password'           => 'required|confirmed',
    	]);

    	if ($validator->fails()) 
    	{
        	return responsejson(1 , $validator->errors()->first() , $validator->errors()); 
    	}

        $request->merge(['password' => bcrypt($request->password)]);
    	$client = Client::create($request->all()); 
    	$client->api_token = str_random(60);
    	$client->save();
    	return responsejson(1 , 'OK' ,
                                      [
							    		 'Api_Token' => $client->api_token,
							    	 	 'Clinet' 	 => $client
							    	   ]); 
    }





    public function login (Request $request)
    { 

    	$validator = validator()->make($request->all(), [
 
  			'phone'              => 'required|numeric', 
  			'password'           => 'required',
    	]);

    	if ($validator->fails()) 
    	{
        	return responsejson(0 , $validator->errors()->first() , $validator->errors()); 
    	} 
	
    	$client = Client::where('phone' , $request->phone)->with('DonationRequests')->first(); 

    	if($client)
    	{
    		if(Hash::check($request->password , $client->password)) // --  ranking is important (string first , hashed second)
    			{
    				return responsejson(1 , 'OK' , 
                                					[	
                                						'Api_Token' => $client->api_token,
                                						'password'	=> $client->password,
                                                        'city'      => $client->city->name,
                                						'client'    => $client,
                                                        // 'posts'     => $client->posts->first()->title
                                					]); 
    			}
    		else 
          		{ 
    				return responsejson(0 , 'fails' , 'password is wrong'); 
    			}
    	}

        return responsejson(0 , 'fails' , 'phone is wrong'); 


    } 





    public function profile (request $request)
    {  
        // dd(auth()->guard('api')->api_token);
    
        // $api_token     = 'lZUJPeSDQztsJ5nPqmH2c8VuVojhhFpIdjvYyrqo6jwiNrB7zuXS0DCycXIC';

        $client = Client::where('api_token' ,  $request->api_token)->first(); 

            return responsejson(1 , 'OK' , 
                                                    [   
                                                        'Api_Token' => $client->api_token,
                                                        'password'  => $client->password,
                                                        'city'      => $client->city->name,
                                                        'client'    => $client,
                                                        // 'posts'     => $client->posts->first()->title
                                                    ]);   

    } 

}
