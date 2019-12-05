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
    	$updatePost=DB::table('posts')
    				->where('id',$id)
    				->increment('views',1);


    	$post=DB::table('posts')
    			->join('users','user_id','=','users.id')
    			->join('categories','category_id','=','categories.id')
    			->where('posts.id',$id)
    			->select('posts.*','users.name','categories.category')
    			->get();

    	return view('readpost',compact(["post"]));
    	//return response()->json($post);
    }

    public function deletePost(Request $request,$id,$url){
    	if($request->session()->has('authenticateUser')){
    		$delPost=DB::table('posts')
    				->where('id',$id)
    				->delete();
    		if($delPost){
    			if(file_exists(public_path('img/post-image/'.$url))){
    				unlink(public_path('img/post-image/'.$url));
    			}

    			return redirect()->route('userHome');
    		}
    	}
    }
}
