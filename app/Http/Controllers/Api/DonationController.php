<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\DonationRequest; 

class DonationController extends Controller
{  
  
    // public function index(request $request)
    // { 
    //     $post = Post::where(function($query) use($request)
    //         { 
    //             if($request->has('category_id')) 
    //             {
    //                 $query->where('category_id' , $request->category_id);
    //             } 

    //             if($request->has('client_id')) 
    //             {
    //                 $query->where('client_id' , $request->client_id);
    //             }
                
    //         })->with('category')->with('client')->paginate(10);

    //     return responsejson(1 , 'ok' , $post); 
    // } 
       
    // public function show($id)
    // {   
    //     $post = Post::where('id' , $id)->first();

    //     if(! $post)
    //     {
    //         return responsejson( 0 , 'OPPs' , 'There Is No Post');
    //     }
        
    //     return responsejson(1 , 'OK' , [
    //                                     'post'     => $post,
    //                                     'client'   => $post->client->name,
    //                                     'category' => $post->category->name, 
    //                                     ]);  
    // }  

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
