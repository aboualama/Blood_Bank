<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\PostDatatable;
use App\Models\Post;
use Carbon\Carbon; 
use Storage;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostDatatable $model)
    {
        return $model->render('admin.Post.index' , ['title' => 'Post']); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Post.create' , ['title' => 'Post']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $data = $this->validate($request, [

            'title'        => 'required|min:6',
            'content'      => 'required', 
            'thumbnail'    => 'image', 
            'category_id'  => 'required|numeric',  
        ]);
   

        if (request()->hasFile('thumbnail')) 
        {  
            $public_path = 'uploads/post';
            $thumbnail_name = time() . '.' . request('thumbnail')->getClientOriginalExtension();
            request('thumbnail')->move($public_path , $thumbnail_name); 
        }else
        { 
            $thumbnail_name = 'default.png';  
        } 

        $data['thumbnail']    = $thumbnail_name; 
        $data['user_id']     = Auth::user()->id;   
        $data['publish_date'] = Carbon::now();  

        $record = Post::create($data);   

        return redirect('dashboard/Post')->with('success' , 'Record Created');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Post::findOrFail($id);
        return view('admin.Post.edit' , compact('record') , ['title' => 'Post']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  

        $record = Post::findOrFail($id); 

        $data = $this->validate($request, [ 
            'title'        => 'required|min:6',
            'content'      => 'required', 
            'thumbnail'    => 'image', 
            'category_id'  => 'required|numeric',  
        ]);
   

        if (request()->hasFile('thumbnail')) 
        {   
            if($record->thumbnail !==  'default.png'){
                Storage::delete('post/'.$record->thumbnail);    
            } 
            $public_path = 'uploads/post';
            $thumbnail_name = time() . '.' . request('thumbnail')->getClientOriginalExtension();
            request('thumbnail')->move($public_path , $thumbnail_name); 

        $data['thumbnail']    = $thumbnail_name; 
        
        }

        $data['user_id']      = Auth::user()->id;   
        $data['publish_date'] = Carbon::now(); 


        $done   = $record->update($data);   

        return redirect('dashboard/Post')->with('success' , 'Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $record = Post::findOrFail($id);   

            if($record->thumbnail !==  'default.png'){
                Storage::delete('Post/'.$record->thumbnail);    
            } 
 
        $done   = Post::destroy($id); 

        return back()->with('success' , 'Record Deleted');
    }
} 