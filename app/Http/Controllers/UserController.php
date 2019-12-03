<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index(Request $request){
    	if($request->session()->has('authenticateUser')){
    		$categories=DB::table('categories')->get();
    		$id=$request->session()->get('authenticateUser');
    		$posts=DB::table('posts')
    				->where('user_id',$id)
    				->get();
            $user=DB::table('users')
                    ->where('id',$id)
                    ->get();
    		return view('user.index',compact(["categories","posts","user"]));
    	}
    	else{
    		return redirect()->route('login');
    	}
    	
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

    public function check(Request $request){
    	$user=DB::table('users')
    			->where('email',$request->email)
    			->where('password',$request->password)
    			->get();

    	$row=$user->count();
    	$id=0;
    	if($row){
    		foreach ($user as $val) {
    			$id=$val->id;
    		}
    		$request->session()->put('authenticateUser',$id);
    		return redirect()->route('userHome');
    	}
    	else{
    		return redirect()->route('login')->with(['error'=>'Wrong user-id or password']);

    	}
    }

    public function update(Request $request){
        if($request->session()->has('authenticateUser')){
            $id=$request->session()->get('authenticateUser');
            $data=array();
            $data['name']=$request->name;
            $data['country']=$request->country;
            $data['phone']=$request->phone;
            $data['description']=$request->description;

            if($request->hasFile('image')){
                $imageName=time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('img/profile-picture/'),$imageName);
                $data['image']=$imageName;
            }

            //return response()->json($data);
            $updateUser=DB::table('users')
                        ->where('id',$id)
                        ->update($data);
            if($updateUser){
                return redirect()->route('userHome');
            }


        }
        else{
            return redirect()->route('login');
        }
    }
}
