<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;




 
    public function test(){

    $string = "subset of s the keys of s an array" ;  

    $key =   explode(" ", $string);

    $str = array_search( "s" , $key);


    return view('welcome' , compact('str'));

    }










}












