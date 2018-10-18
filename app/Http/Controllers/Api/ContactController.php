<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;  
use Mail; 

class ContactController extends Controller
{
      
    public function contact (request $request)
    {
        
        $validator = validator()->make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email',
            'telephone' => 'numeric',
            'subject'   => 'min:3',
            'message'   => 'min:10']);

        if ($validator->fails()) 
        {
            return responsejson(1 , $validator->errors()->first() , $validator->errors()); 
        }

        $data = array(
            'name'        => $request->name,
            'email'       => $request->email,
            'telephone'   => $request->telephone,
            'subject'     => $request->subject,
            'bodyMessage' => $request->message
            );

        Mail::send('we', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('aboualama@gmail.com');
            $message->subject($data['subject']);
        });
 

        
        return responsejson( 1 , 'Your Email Was Sent Successfully !' , $data );   

    }

}
