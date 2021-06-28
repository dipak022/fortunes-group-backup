<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;
use File;
class LatestNewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function latest_news(){
    	$latest_news=DB::table('latest_news')->get();
    	return view('backend-page.latest_news.latest',compact('latest_news'));
    }

    public function Storelatest_news(Request $request){
   
       $data=array();
       $image=$request->image;
       $data['title']=$request->title;
       $data['date']=$request->date;
       $data['description']=$request->description;

       if ($image) {
         $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(1200,1000)->save('public/public/media/fCategory/'.$image_one_name);
        $data['image']='public/public/media/fCategory/'.$image_one_name;
        $done=DB::table('latest_news')->insert($data);
         if($done){
          $notification = array(
                'message' => 'latest news Added Successfully.',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'latest news Not  Added',
                'alert-type' => 'danger'
            );
        return redirect()->back()->with($notification);
        }
       }

	}
	public function Editlatest_news($id){
        $latest_news=DB::table('latest_news')->where('id',$id)->first();
    	return view('backend-page.latest_news.Editlatest',compact('latest_news'));
	}

	public function Updatelatest_news(Request $request,$id){
        $data=array();
       $old_image=$request->old_image;
       $image=$request->image;
       $data['title']=$request->title;
       $data['date']=$request->date;
       $data['description']=$request->description;
        if ($image) {
          unlink($old_image);
         $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(1200,1000)->save('public/public/media/fCategory/'.$image_one_name);
        $data['image']='public/public/media/fCategory/'.$image_one_name;
         $done=DB::table('latest_news')->where('id',$id)->update($data);
         if($done){
          $notification = array(
                'message' => 'latest news Update Successfully.',
                'alert-type' => 'success'
            );
        return redirect()->route('latest_news')->with($notification);
        }else{
          $notification = array(
                'message' => 'latest news Not  Update',
                'alert-type' => 'danger'
            );
        return redirect()->back()->with($notification);
        }
       }else{
       $done=DB::table('latest_news')->where('id',$id)->update($data);
         if($done){
        	$notification = array(
                'message' => 'latest news Update Successfully.',
                'alert-type' => 'success'
            );
    	return redirect()->route('latest_news')->with($notification);
        }else{
          $notification = array(
                'message' => 'latest news Not  Updated.',
                'alert-type' => 'danger'
            );
    	return redirect()->route('news_event')->with($notification);
        }
      }  
	}


	  public function Deletelatest_news($id){
        $done=DB::table('latest_news')->where('id',$id)->delete();
        
        if($done){
        	$notification = array(
                'message' => 'latest news Delated Successfully.',
                'alert-type' => 'success'
            );
    	return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'latest news Not  Delated.',
                'alert-type' => 'danger'
            );
    	return Redirect()->back()->with($notification);
        }
    }
}
