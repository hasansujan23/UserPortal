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
    		->select('posts.*','users.name')
    		->get();
    	return view('index',compact('posts'));
    	//return response()->json($posts);
    }

    public function about(){
    	return view('about');
    }
}
