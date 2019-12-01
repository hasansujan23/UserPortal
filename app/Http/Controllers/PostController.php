<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class PostController extends Controller
{
    public function create(Request $request){
    	if($request->session()->has('authenticateUser')){
    			$data=array();
    			$data['user_id']=$request->session()->get('authenticateUser');
    			$data['category_id']=$request->category;
    			$data['title']=$request->title;
    			$data['description']=$request->description;
    			$data['image']="";
    			$data['posted_at']=Carbon::now();
    			$data['views']=0;
	    		if($request->hasFile('image')){
	    		$imageName=time().'.'.$request->image->getClientOriginalExtension();
	    		$request->image->move(public_path('img/post-image/'),$imageName);
	    		$data['image']=$imageName;

	    		$post=DB::table('posts')->insert($data);

	    		if($post){
	    			return redirect()->route('userHome');
	    		}
	    	}



	    	//return response()->json($data);
    	}
    }

    public function readPost($id){
    	$post=DB::table('posts')
    			->where('id',$id)
    			->get();

    	return response()->json($post);
    }
}
