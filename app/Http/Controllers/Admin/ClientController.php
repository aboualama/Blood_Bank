<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\DataTables\ClientDatatable;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ClientDatatable $model)
    { 
        $records = Client::all();
        return view('admin.Client.index'  , compact('records'))->with('title' , 'Client'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Client.create' , ['title' => 'Client']);
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

            'name'             => 'required|min:6', 
            'governorate_id'   => 'required|numeric'
        ]);
 
        $record = Client::create($data);   

        return redirect('dashboard/Client')->with('success' , 'Record Created');
  
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
        $record = Client::findOrFail($id);
        return view('admin.Client.edit' , compact('record') , ['title' => 'Client']);
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
        $data = $this->validate($request, [

            'name'             => 'required|min:6', 
            'governorate_id'   => 'required|numeric'
        ]);
 
        $record = Client::find($id); 
        $done   = $record->update($data);   

        return redirect('dashboard/Client')->with('success' , 'Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $done   = Client::destroy($id);  
        return back()->with('success' , 'Record Deleted');
    }




    public function active($id)
    {  
        $record   = Client::find($id);   

        $is_active = $record->is_active; 
        
        if ($is_active == 0)
        {
            $record->is_active = 1 ; 
            $record->save();
            return redirect('dashboard/Client')->with('success' , 'This Client Is Active Now');
        }else 
        {
            $record->is_active = 0 ; 
            $record->save();
            return redirect('dashboard/Client')->with('success' , 'This Client Is Pending Now');
        }
        
    }
} 