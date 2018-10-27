<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings;
use Mail; 

class SettingsController extends Controller
{
  
 

    public function edit()
    {
        $settings   = Settings::first();
        return view('admin.settings.edit', compact('settings'));
    }

 
    public function update(Request $request)
    {

        $data = $this->validate(request(), [
                    
                    'email'         => 'required|email|max:255', 
                    'phone'         => 'required|numeric', 
                    'whatsapp'      => 'required|numeric', 
                    'facebook_url'  => 'required',   
                    'twitter_url'   => 'required',   
                    'youtube_url'   => 'required',   
                    'twitter_url'   => 'required',   
                    'instagram_url' => 'required',   
                    'google_url'    => 'required',   
                    'about'         => 'required',     
            ]);  
     
        $Settings     = Settings::first();
        $Settings->update($data);
        return back()->with('success' , 'Record Updated');
    }
 
}
