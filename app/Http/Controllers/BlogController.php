<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;
use File;
class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function blog(){
    	$blog=DB::table('blog')->get();
    	return view('backend-page.blog.blog',compact('blog'));
    }

    public function Storeblog(Request $request){
   
       $data=array();
       $image=$request->image;
       $data['title']=$request->title;
       $data['description']=$request->description;

       if ($image) {
         $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(1200,1000)->save('public/public/media/fCategory/'.$image_one_name);
        $data['image']='public/public/media/fCategory/'.$image_one_name;
        $done=DB::table('blog')->insert($data);
         if($done){
          $notification = array(
                'message' => 'blog Added Successfully.',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'blog Not  Added',
                'alert-type' => 'danger'
            );
        return redirect()->back()->with($notification);
        }
       }

	}
	public function Editblog($id){
        $blog=DB::table('blog')->where('id',$id)->first();
    	return view('backend-page.blog.Editblog',compact('blog'));
	}

	public function Updateblog(Request $request,$id){
        $data=array();
       $old_image=$request->old_image;
       $image=$request->image;
       $data['title']=$request->title;
       $data['description']=$request->description;
        if ($image) {
          unlink($old_image);
         $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(1200,1000)->save('public/public/media/fCategory/'.$image_one_name);
        $data['image']='public/public/media/fCategory/'.$image_one_name;
         $done=DB::table('blog')->where('id',$id)->update($data);
         if($done){
          $notification = array(
                'message' => 'blog Update Successfully.',
                'alert-type' => 'success'
            );
        return redirect()->route('blog')->with($notification);
        }else{
          $notification = array(
                'message' => 'blog Not  Update',
                'alert-type' => 'danger'
            );
        return redirect()->back()->with($notification);
        }
       }else{
       $done=DB::table('blog')->where('id',$id)->update($data);
         if($done){
        	$notification = array(
                'message' => 'blog Update Successfully.',
                'alert-type' => 'success'
            );
    	return redirect()->route('blog')->with($notification);
        }else{
          $notification = array(
                'message' => 'blog Not  Updated.',
                'alert-type' => 'danger'
            );
    	return redirect()->route('blog')->with($notification);
        }
      }  
	}


	  public function Deleteblog($id){
        $done=DB::table('blog')->where('id',$id)->delete();
        
        if($done){
        	$notification = array(
                'message' => 'blog Delated Successfully.',
                'alert-type' => 'success'
            );
    	return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'blog Not  Delated.',
                'alert-type' => 'danger'
            );
    	return Redirect()->back()->with($notification);
        }
    }
}
