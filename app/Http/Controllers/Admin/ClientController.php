<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client; 

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $records = Client::all();
        return view('admin.Client.index'  , compact('records'))->with('title' , 'Client'); 
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