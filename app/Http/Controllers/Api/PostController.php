<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\Category;
use App\Models\Post; 
use App\User; 

class PostController extends Controller
{  
  
    public function index(request $request)
    { 
        $posts = Post::where(function($query) use($request)
            { 
                if($request->has('category_id')) 
                {
                    $query->where('category_id' , $request->category_id);
                }  
                if($request->has('user_id')) 
                {
                    $query->where('user_id' , $request->user_id);
                } 
                if($request->has('search')) 
                {
                    $query->where('title', 'like' ,'%'.$request->search.'%');
                } 
            })->with('category')->with('user')->withcount('favorite')->paginate(10); 

        if($posts->count() == 0)
        {
            return responsejson( 0 , 'OPPs' , 'There Is No Any Posts');
        } 
        return responsejson(1 , 'ok' , $posts); 
    } 
       



    public function show($id)
    {   
        $post = Post::where('id' , $id)->first(); 
        if(! $post)
        {
            return responsejson( 0 , 'OPPs' , 'There Is No Post');
        } 
        return responsejson(1 , 'OK' , [
                                        'post'            => $post,
                                        'favorite count'  => $post->favorite()->count(),  
                                        ]);  
    }  
  

}
