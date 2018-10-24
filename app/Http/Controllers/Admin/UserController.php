<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;  
use Auth;
use App\DataTables\UserDatatable;

class UserController extends Controller
{ 
  
    public function index(UserDatatable $user)
    { 
        return $user->render('admin.user.user' , ['title' => 'User']); 
    }
 
 
   public function edit($id)

    {
        $user = user::find($id);
        return view('admin.user.edituser' , compact('user'));
    }


   public function update(request $request , $id)

    {    

 		$user = user::find($id);

        $data = $this->validate(request(), [

            'first_name'    => 'required|string|min:6|max:255',
            'last_name'     => 'required|string|min:6|max:255', 
            'date'          => 'required',
            'gender'        => 'required',
            'bio'           => 'required|string|min:6|max:255',
                
            ]);
        
  
        $data['first_name'] = $request->first_name;
        $data['last_name']  = $request->last_name;
        $data['email']      = $request->email;
        $data['date']       = $request->date;
        $data['gender']     = $request->gender;
        $data['status']  	= $request->status;
        $data['bio']        = $request->bio;   

        if ( ! $request->password == '')
        {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);
        return redirect ('admin/user')->with('succses' , 'Your account has been updated!');
    }
 
    public function destroy($id)
    { 
        $user   = user::find($id);
        $user->delete();

        return back() ;
    }

    public function logout()
    { 
        auth()->logout();
        return redirect ('login');
    }
}
