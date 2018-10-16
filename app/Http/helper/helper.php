<?php



if(!function_exists('responsejson')){

	function responsejson($status , $message , $date=null){     	
 
        $response = [ 
			'status'  => $status,
			'message' => $message,
			'date'    => $date,
        ];

        return response()->json($response); 
    } 
}


if(!function_exists('auth_client')){
	function auth_client(){ 
		return auth()->guard('api');
	}
}


if(!function_exists('slug')){
	function slug($string){ 
		return str_replace(' ','-', strtolower($string));
	}
}