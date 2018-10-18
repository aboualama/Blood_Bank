<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\Category;
use App\Models\Post; 

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
                if($request->has('client_id')) 
                {
                    $query->where('client_id' , $request->client_id);
                } 
                if($request->has('search')) 
                {
                    $query->where('title', 'like' ,'%'.$request->search.'%');
                } 
            })->with('category')->with('client')->paginate(10); 
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
                                        'client'          => $post->client->name,
                                        'category'        => $post->category->name, 
                                        ]);  
    }  
























    // public function create(request $request)
    // {
    //     $data = $request->all(); 
    //     $validator = validator()->make($data, [

    //         'title'        => 'required',
    //         'content'      => 'required', 
    //         'thumbnail'    => 'required', 
    //         'publish_date' => 'required', 
    //         'category_id'  => 'required|numeric', 
    //     ]);

    //     if ($validator->fails()) 
    //     {
    //         return responsejson( 0 , $validator->errors()->first() , $validator->errors()); 
    //     }

    //     // $request->client_id = auth()->guard('api')->id; 
 
    //     $post = Post::create($request->all());  
    //     $post->save();
    //     return responsejson(1 , 'OK' , $post ); 
    // }  

    // public function update(request $request , $id)
    // {
    //     $data = $request->all(); 
    //     $validator = validator()->make($data, [

    //         'title'        => 'required',
    //         'content'      => 'required', 
    //         'thumbnail'    => 'required', 
    //         'publish_date' => 'required', 
    //         'category_id'  => 'required|numeric', 
    //     ]);

    //     if ($validator->fails()) 
    //     {
    //         return responsejson(1 , $validator->errors()->first() , $validator->errors()); 
    //     } 

    //     // $request->client_id = auth()->guard('api')->id; 

    //     $post  = post::find($id);
    //     $post->update($data); 
    //     return responsejson(1 , 'OK' , $post ); 
    // }  

    // public function delete($id)
    // {  
    //     $post  = post::find($id);
    //     $post->delete($id); 
    //     return responsejson(1 , 'OK' , 'This Post Has Been Deleted Successfully' ); 
    // }
      





    // public function categories(request $request)
    // {
    //     $category = Category::all();

    //     return responsejson(1 , 'ok' , $category);
    // } 

    // public function category($id)
    // {
    //     $category = Category::with('posts')->find($id);
    //     if(! $category)
    //     {
    //         return responsejson( 0 , 'OPPs' , 'There Is No Category');
    //     }
        
    //     return responsejson(1 , 'OK' , $category);  
 
    // }





}
