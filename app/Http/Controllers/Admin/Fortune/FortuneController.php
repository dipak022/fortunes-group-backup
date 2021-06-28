<?php

namespace App\Http\Controllers\Admin\Fortune;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use File;
class FortuneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function middleCategory(){
    	$Fortune=DB::table('fortuneCategory')->get();
    	return view('backend-page.Fortune.Fortune',compact('Fortune'));
    }

    public function Storefortune(Request $request){
      $validatedData = $request->validate([
            //'images.*'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'               => 'required|unique:fortuneCategory|max:100',
            'short_description'  => 'required|unique:fortuneCategory|max:3000',
            
        ]);
       $data=array();
       $image=$request->image;
       $data['name']=$request->name;
       $data['priority']=$request->priority;
       $data['short_description']=$request->short_description;
       $data['vedio_link']=$request->vedio_link;
       $data['webside_link']=$request->webside_link;

       if ($image) {
         $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(150,80)->save('public/public/media/fCategory/'.$image_one_name);
        $data['image']='public/public/media/fCategory/'.$image_one_name;
        $done=DB::table('fortuneCategory')->insert($data);
         if($done){
          $notification = array(
                'message' => 'fortune Category Added Successfully.',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'fortune Category Not  Added',
                'alert-type' => 'danger'
            );
        return redirect()->back()->with($notification);
        }
       }

	}
	public function EditFortune($id){
        $fortune=DB::table('fortuneCategory')->where('id',$id)->first();
    	return view('backend-page.Fortune.EditFortune',compact('fortune'));
	}

	public function UpdateFortune(Request $request,$id){
        $data=array();
       $old_image=$request->old_image;
       $image=$request->image;
       $data['name']=$request->name;
       $data['priority']=$request->priority;
       $data['short_description']=$request->short_description;
       $data['vedio_link']=$request->vedio_link;
       $data['webside_link']=$request->webside_link;
       
        if ($image) {
          unlink($old_image);
         $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(150,80)->save('public/public/media/fCategory/'.$image_one_name);
        $data['image']='public/public/media/fCategory/'.$image_one_name;
         $done=DB::table('fortuneCategory')->where('id',$id)->update($data);
         if($done){
          $notification = array(
                'message' => 'fortune Category Update Successfully.',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'fortune Category Not  Update',
                'alert-type' => 'danger'
            );
        return redirect()->back()->with($notification);
        }
       }else{
       $done=DB::table('fortuneCategory')->where('id',$id)->update($data);
         if($done){
        	$notification = array(
                'message' => 'fortune Update Successfully.',
                'alert-type' => 'success'
            );
    	return redirect()->route('middleCategory')->with($notification);
        }else{
          $notification = array(
                'message' => 'fortune Not  Updated.',
                'alert-type' => 'danger'
            );
    	return redirect()->route('middleCategory')->with($notification);
        }
      }  
	}


	  public function DeleteFortune($id){
        $done=DB::table('fortuneCategory')->where('id',$id)->delete();
        
        if($done){
        	$notification = array(
                'message' => 'Fortune Delated Successfully.',
                'alert-type' => 'success'
            );
    	return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'Fortune Not  Delated.',
                'alert-type' => 'danger'
            );
    	return Redirect()->back()->with($notification);
        }
    }
}
