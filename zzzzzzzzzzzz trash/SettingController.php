<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\Settings; 
use App\Models\Report; 

class SettingController extends Controller
{  
   
       
    public function show()
    {   
        $setting = Settings::first(); 
        if(! $setting)
        {
            return responsejson( 0 , 'OPPs' , 'There Is No Setting');
        } 
        return responsejson(1 , 'OK' , $setting);  
    }  

   
       
    public function about()
    {   
        $about = Settings::first()->pluck('about'); 
        if(! $about)
        {
            return responsejson( 0 , 'OPPs' , 'There Is No Setting');
        } 
        return responsejson(1 , 'OK' , $about);  
    }  
 
 
    public function report(request $request)
    {
        $data = $request->all(); 
        $validator = validator()->make($data, [ 
            'message'         => 'required', 
        ]); 
        if ($validator->fails()) 
        {
            return responsejson( 0 , $validator->errors()->first() , $validator->errors()); 
        } 
        // $request->client_id = auth()->guard('api')->id;   
        $report = Report::create($data);  
        $report->save();
        return responsejson(1 , 'OK' , $report); 
    } 
















    // public function create(request $request)
    // {
    //     $data = $request->all(); 
    //     $validator = validator()->make($data, [ 
    //         'phone'         => 'required',
    //         'email'         => 'required',
    //         'about_app'     => 'required',
    //         'facebook_url'  => 'required',
    //         'twitter_url'   => 'required',
    //         'youtube_url'   => 'required', 
    //         'whatsapp'      => 'required', 
    //         'instagram_url' => 'required', 
    //         'google_url'    => 'required',  
    //         'about'         => 'required',
    //     ]); 
    //     if ($validator->fails()) 
    //     {
    //         return responsejson( 0 , $validator->errors()->first() , $validator->errors()); 
    //     } 
    //     $setting = Settings::create($request->all());  
    //     $setting->save();
    //     return responsejson(1 , 'OK' , $setting ); 
    // }  


    // public function update(request $request)
    // {
    //     $data = $request->all(); 
    //     $validator = validator()->make($data, [ 
    //         'phone'         => 'required',
    //         'email'         => 'required',
    //         'about_app'     => 'required',
    //         'facebook_url'  => 'required',
    //         'twitter_url'   => 'required',
    //         'youtube_url'   => 'required', 
    //         'whatsapp'      => 'required', 
    //         'instagram_url' => 'required', 
    //         'google_url'    => 'required',  
    //         'about'         => 'required',
    //     ]); 
    //     if ($validator->fails()) 
    //     {
    //         return responsejson( 0 , $validator->errors()->first() , $validator->errors()); 
    //     } 
    //     $setting  = Settings::first();
    //     $setting->update($data); 
    //     return responsejson(1 , 'OK' , $setting); 
    // }  
 
 


}
