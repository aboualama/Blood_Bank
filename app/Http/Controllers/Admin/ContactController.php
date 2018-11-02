<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact; 

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $records = Contact::paginate(15);
        return view('admin.Contact.index'  , compact('records'))->with('title' , 'Contact'); 
    } 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        $record   = Contact::find($id);  
        return view('admin.Contact.show'  , compact('record')); 
    } 


    public function destroy($id)
    {  
        $done   = Contact::destroy($id);  
        return back()->with('success' , 'Contact Deleted');
    } 
 
}
