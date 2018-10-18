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
            'name'               => 'required|min:6',
			'email'              => 'required|email|unique:clients',
            'birth_date'         => 'required|date|before:2010-01-01',
			'city_id'            => 'required|numeric',
			'phone'              => 'required|numeric|unique:clients',
			'donation_last_date' => 'required|date|before:today',
			'blood_type'         => 'required|in:O-,O+,B-,B+,A+,A-,AB-,AB+',
			'password'           => 'required|confirmed|min:6|max:60|alpha_num',  
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
    		if(Hash::check($request->password , $client->password)) // --  ranking is important (string, hashed)
    			{
    				return responsejson(1 , 'OK' , 
                                					[	
                                						'Api_Token' => $client->api_token,
                                						'password'	=> $client->password,
                                                        'city'      => $client->city->name,
                                						'client'    => $client, 
                                					]); 
    			}
    		else 
          		{ 
    				return responsejson(0 , 'fails' , 'password is wrong'); 
    			}
    	} 
        return responsejson(0 , 'fails' , 'phone is wrong');  
    }  




    public function update(request $request )
    {
        $client = Client::where('api_token' ,  $request->api_token)->first();  
        $data = $request->all(); 
        $validator = validator()->make($data, [   
            'name'               => 'required|min:6',
            'email'              => 'required|email|unique:clients,email,'.$client->id,
            'birth_date'         => 'required|date|before:2010-01-01',
            'city_id'            => 'required|numeric',
            'phone'              => 'required|numeric|unique:clients,phone,'.$client->id,
            'donation_last_date' => 'required|date|before:today',
            'blood_type'         => 'required|in:O-,O+,B-,B+,A+,A-,AB-,AB+', 
        ]); 
        if ($validator->fails()) 
        {
            return responsejson(1 , $validator->errors()->first() , $validator->errors()); 
        }  
        if ( ! $request->password == '')
        {
            $data['password'] = bcrypt($request->password);
        } 
        else
        {
            $data['password'] = $client->password;
        } 
        $client->update($data); 
        return responsejson(1 , 'OK' , $client ); 
    }   



    public function profile (request $request)
    {   
        $client = Client::where('api_token' ,  $request->api_token)->first();  
        return responsejson(1 , 'OK' ,  $client);   

    } 
}
