<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;
use File;
class NewsEventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function news_event(){
    	$news_event=DB::table('news_event')->get();
    	return view('backend-page.news_event.news_event',compact('news_event'));
    }

    public function Storenews_event(Request $request){
   
       $data=array();
       $image=$request->image;
       $data['title']=$request->title;
       $data['description']=$request->description;

       if ($image) {
         $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(1200,1000)->save('public/public/media/fCategory/'.$image_one_name);
        $data['image']='public/public/media/fCategory/'.$image_one_name;
        $done=DB::table('news_event')->insert($data);
         if($done){
          $notification = array(
                'message' => 'Event Added Successfully.',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'Event Not  Added',
                'alert-type' => 'danger'
            );
        return redirect()->back()->with($notification);
        }
       }

	}
	public function Editnews_event($id){
        $news_event=DB::table('news_event')->where('id',$id)->first();
    	return view('backend-page.news_event.Editnews_event',compact('news_event'));
	}

	public function Updatenews_event(Request $request,$id){
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
         $done=DB::table('news_event')->where('id',$id)->update($data);
         if($done){
          $notification = array(
                'message' => 'event Update Successfully.',
                'alert-type' => 'success'
            );
        return redirect()->route('news_event')->with($notification);
        }else{
          $notification = array(
                'message' => 'event Not  Update',
                'alert-type' => 'danger'
            );
        return redirect()->back()->with($notification);
        }
       }else{
       $done=DB::table('news_event')->where('id',$id)->update($data);
         if($done){
        	$notification = array(
                'message' => 'event Update Successfully.',
                'alert-type' => 'success'
            );
    	return redirect()->route('news_event')->with($notification);
        }else{
          $notification = array(
                'message' => 'event Not  Updated.',
                'alert-type' => 'danger'
            );
    	return redirect()->route('news_event')->with($notification);
        }
      }  
	}


	  public function Deletenews_event($id){
        $done=DB::table('news_event')->where('id',$id)->delete();
        
        if($done){
        	$notification = array(
                'message' => 'event Delated Successfully.',
                'alert-type' => 'success'
            );
    	return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'evemt Not  Delated.',
                'alert-type' => 'danger'
            );
    	return Redirect()->back()->with($notification);
        }
    }
}
