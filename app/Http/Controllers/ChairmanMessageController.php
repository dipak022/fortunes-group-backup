<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;
use File;
class ChairmanMessageController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function chairmanmessage(){
        return view('backend-page.chairmanmessage.chairmanmessage');

    }

    public function storechairmanmessage(Request $request){
        $validatedData = $request->validate([
            'description'            => 'unique:chairmaninfo|max:5000',
            'title'                  => 'unique:chairmaninfo|max:300',

        ]);
        $data=array();
        $data['description']=$request->description;
        $data['position']=$request->position;
    
        $image=$request->image;
        if($image){
            $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200,1000)->save('public/public/media/Gallery/'.$image_one_name);
            $data['image']='public/public/media/Gallery/'.$image_one_name;
            
            $done=DB::table('chairmaninfo')->insert($data);

            if($done){
                $notification = array(
                    'message' => 'chairman info Added Successfully.',
                    'alert-type' => 'success'
                );
            return redirect()->back()->with($notification);
            }else{
              $notification = array(
                    'message' => 'chairman info Not  Added',
                    'alert-type' => 'danger'
                );
            return redirect()->back()->with($notification);
            }
                
               
    }else{
        $notification = array(
                    'message' => 'chairman image must be Added',
                    'alert-type' => 'warning'
                );
            return redirect()->back()->with($notification);
    }

    }

    
    public function showchairmanmessage(){
    	$showAllchairmaninfo=DB::table('chairmaninfo')->get();
    	return view('backend-page.chairmanmessage.showAllchairmaninfo',compact('showAllchairmaninfo'));
    }
    public function editchairmanmessage($id){
      $chairmaninfo=DB::table('chairmaninfo')->where('id',$id)->first();
        return view('backend-page.chairmanmessage.editchairmanmessage',compact('chairmaninfo'));
    }

    public function updatechairmanmessage(Request $request,$id){
        
        $data=array();
        $data['description']=$request->description;
        $data['position']=$request->position;
        $image=$request->image;
        $old_image=$request->old_image;
    
       
    
        if($image){
            //unlink($old_image);
            $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200,1000)->save('public/public/media/Gallery/'.$image_one_name);
            $data['image']='public/public/media/Gallery/'.$image_one_name;
            
           
            $done=DB::table('chairmaninfo')->where('id',$id)->update($data);

            if($done){
                $notification = array(
                    'message' => 'chairman info Update Successfully.',
                    'alert-type' => 'success'
                );
            return redirect()->route("chairmanmessageshow")->with($notification);
            }else{
              $notification = array(
                    'message' => 'chairman info Not  Update',
                    'alert-type' => 'danger'
                );
            return redirect()->back()->with($notification);
            }
                
               
    } else{
        $done=DB::table('chairmaninfo')->where('id',$id)->update($data);

        if($done){
            $notification = array(
                'message' => 'chairman info Update Successfully.',
                'alert-type' => 'success'
            );
        return redirect()->route("chairmanmessageshow")->with($notification);
        }else{
          $notification = array(
                'message' => 'chairman info Not  Update',
                'alert-type' => 'danger'
            );
        return redirect()->back()->with($notification);
        }
    }

    }
    
    public function deletechairmanmessage($id){
        $images=DB::table('chairmaninfo')->where('id',$id)->first();
        $image=$images->image;
        //unlink($image);

        $done=DB::table('chairmaninfo')->where('id',$id)->delete();

        if($done){
            $notification = array(
                'message' => 'chairman info Delete Successfully.',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'chairman info Not  Delete',
                'alert-type' => 'danger'
            );
        return redirect()->back()->with($notification);
        }
    }
}

