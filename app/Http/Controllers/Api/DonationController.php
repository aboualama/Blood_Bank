<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\DonationRequest; 

class DonationController extends Controller
{  
  
  
    public function index(request $request)
    { 
        $donations = DonationRequest::where(function($query) use($request)
            { 
                if($request->has('blood_type')) 
                {
                    $query->where('blood_type' , $request->blood_type);
                } 

                if($request->has('city_id')) 
                {
                    $query->where('city_id' , $request->city_id);
                } 
                
            })->paginate(10);

        if($donations->count() == 0)
        {
            return responsejson( 0 , 'OPPs' , 'There Is No Posts');
        }
 
        return responsejson(1 , 'ok' , $donations); 
    } 
       
   
       
    public function show($id)
    {   
        $donation = DonationRequest::where('id' , $id)->first();

        if(! $donation)
        {
            return responsejson( 0 , 'OPPs' , 'There Is No Donation Request');
        }
        
        return responsejson(1 , 'OK' , $donation);  
    }  



    public function create(request $request)
    {
        $data = $request->all(); 
        $validator = validator()->make($data, [

            'name'             => 'required',
            'age'              => 'required',
            'blood_type'       => 'required|in:O-,O+,B-,B+,A+,A-,AB-,AB+',
            'bags_num'         => 'required',
            'hospital_name'    => 'required',
            'hospital_address' => 'required', 
            'city_id'          => 'required', 
            'phone'            => 'required', 
            'notes'            => 'required', 
            'latitude'         => 'required|numeric', 
            'longitude'        => 'required|numeric', 
        ]);

        if ($validator->fails()) 
        {
            return responsejson( 0 , $validator->errors()->first() , $validator->errors()); 
        }

        // $request->client_id = auth()->guard('api')->id; 
 
        $donation = DonationRequest::create($request->all());  
        $donation->save();
        return responsejson(1 , 'OK' , $donation ); 
    }  
 
 


}
