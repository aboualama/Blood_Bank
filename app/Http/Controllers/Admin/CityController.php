<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\DataTables\CityDatatable;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CityDatatable $model)
    {
        return $model->render('admin.City.index' , ['title' => 'City']); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.City.create' , ['title' => 'City']);
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
 
        $record = City::create($data);   

        return redirect('dashboard/City')->with('success' , 'Record Created');
  
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
        $record = City::findOrFail($id);
        return view('admin.City.edit' , compact('record') , ['title' => 'City']);
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
 
        $record = City::find($id); 
        $done   = $record->update($data);   

        return redirect('dashboard/City')->with('success' , 'Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $done   = City::destroy($id);  
        return back()->with('success' , 'Record Deleted');
    }
}
