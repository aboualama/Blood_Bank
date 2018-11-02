<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Report; 

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $records = Report::paginate(15);
        return view('admin.Report.index'  , compact('records'))->with('title' , 'Report'); 
    } 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        $record   = Report::find($id);  
        return view('admin.Report.show'  , compact('record')); 
    } 


    public function destroy($id)
    {  
        $done   = Report::destroy($id);  
        return back()->with('success' , 'Report Deleted');
    } 
 
}
