<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function index(){
    	//return view('index');
    	$posts=DB::table('posts')
    		->join('users','user_id','=','users.id')
    		->join('categories','category_id','=','categories.id')
    		->select('posts.*','users.name','categories.category')
    		->get();
    	return view('index',compact('posts'));
    	//return response()->json($posts);
    }

    public function about(){
    	return view('about');
    }

    public function signup(){
    	return view('signup');
    }

    public function login(){
    	return view('login');
    }

    public function logout(Request $request){
    	$request->session()->forget('authenticateUser');
    	return redirect()->route('login');
    }
}
