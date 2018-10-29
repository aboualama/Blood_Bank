<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DonationRequest; 

class DonationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $records = DonationRequest::paginate(15);
        return view('admin.DonationRequest.index'  , compact('records'))->with('title' , 'Donation Request'); 
    } 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $done   = DonationRequest::destroy($id);  
        return back()->with('success' , 'Donation Request Deleted');
    } 
} 