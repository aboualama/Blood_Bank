<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;  
use App\Models\Client;
use App\Models\Post; 

class FavoriteController extends Controller
{   

    public function addfavorite (request $request , $post)  // $post = post->id
    {
 
        $api_token = $request->api_token; 
        $user =  Client::where('api_token' , $api_token)->first();        //auth_client(); 

        $is_favorite = $user->favorite()->where('post_id' , $post)->count();  
        
        if ($is_favorite == 0)
        {
            $user->favorite()->attach($post);  
            return responsejson(1 , 'OK' , 'Added Favorite Post'); 
        }else 
        {
            $user->favorite()->detach($post);  
            return responsejson(1 , 'OK' , 'Removed Favorite Post'); 
        }
    }        
     


    public function favoritepost (request $request) 
    {
        $api_token = $request->api_token;  
        $user =  Client::where('api_token' , $api_token)->first();  

        $favorite   = $user->favorite(); 
        
        if($favorite->count() > 0)
        {
            return responsejson(1 , 'OK' , [ 'posts title' => $user->favorite()->pluck('title'), ] );  
        } 
        return responsejson(0 , 'fails' , 'there is no posts');
    }     
}
