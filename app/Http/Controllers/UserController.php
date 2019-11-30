<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index(){
    	return view('signup');
    }

    public function create(Request $request){

    	$validatedData = $request->validate([
            'email' => 'required|unique:users,email',
            'name' => 'required',
            'password' => 'required|min:6',
        ]);

    	//$user=new User;

    	//$user->name=$request->name;
    	//$user->email=$request->email;
    	//$user->password=$request->password;
    	$result=DB::table('users')->insert(
    		["name"=>"$request->name","email"=>"$request->email","password"=>"$request->password"]
    	);

    	if($result){
    		echo "Registration Complete";
    	}
    	else{
    		echo "Registration Failed";
    	}
    }
}
