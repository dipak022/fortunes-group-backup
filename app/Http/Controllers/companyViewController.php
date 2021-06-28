<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;
class companyViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function companyoverview (){
        $companyinfo=DB::table('companyinfo')->get();
    	return view('backend-page.companyoverview.companyoverview',compact('companyinfo'));
    }
    
    public function storecompanyoverview(Request $request){
        $data['name']=$request->name;
        $data['description']=$request->description;
        $image=$request->image;

        if($image){
                $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(1200,1000)->save('public/public/media/companyoverview/'.$image_one_name);
                $data['image']='public/public/media/companyoverview/'.$image_one_name;

    
                
                $done=DB::table('companyinfo')->insert($data);

		        if($done){
		        	$notification = array(
		                'message' => 'company overview Added Successfully.',
		                'alert-type' => 'success'
		            );
		    	return redirect()->back()->with($notification);
		        }else{
		          $notification = array(
		                'message' => 'company overview  Not  Added',
		                'alert-type' => 'danger'
		            );
		    	return redirect()->back()->with($notification);
		        }
                    
                   
        }else{
            $notification = array(
                        'message' => 'company overview Image  must be Added',
                        'alert-type' => 'warning'
                    );
                return redirect()->back()->with($notification);
        }
    }
    public function deletecompanyoverview($id){

        $images=DB::table('companyinfo')->where('id',$id)->first();
        $image=$images->image;
        if ($image) {
           unlink($image);
          $done=DB::table('companyinfo')->where('id',$id)->delete();
        
        if($done){
            $notification = array(
                'message' => 'companyinfo Delated Successfully.',
                'alert-type' => 'success'
            );
        return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'companyinfo Not  Delated.',
                'alert-type' => 'danger'
            );
        return Redirect()->back()->with($notification);
        }

        }else{
            $done=DB::table('companyinfo')->where('id',$id)->delete();
        
        if($done){
            $notification = array(
                'message' => 'companyinfo Delated Successfully.',
                'alert-type' => 'success'
            );
        return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'companyinfo Not  Delated.',
                'alert-type' => 'danger'
            );
        return Redirect()->back()->with($notification);
          }
        }
       

    }

    public function editcompanyoverview($id){
        $companyinfo=DB::table('companyinfo')->where('id',$id)->first();
    	return view('backend-page.companyoverview.editcompanyoverview',compact('companyinfo'));

    }

    public function updatecompanyoverview(Request $request ,$id){
        $data['name']=$request->name;
        $data['description']=$request->description;
        $data['shortdescription']=$request->shortdescription;
        $image=$request->image;
        $old_image=$request->old_image;

        if($image){
                unlink($old_image);
                $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(1200,1000)->save('public/public/media/companyoverview/'.$image_one_name);
                $data['image']='public/public/media/companyoverview/'.$image_one_name;

    
                
                
                $done=DB::table('companyinfo')->where('id',$id)->update($data);

		        if($done){
		        	$notification = array(
		                'message' => 'company overview  Update Successfully.',
		                'alert-type' => 'success'
		            );
		    	return redirect()->route('companyoverview')->with($notification);
		        }else{
		          $notification = array(
		                'message' => 'company overview Not  Update',
		                'alert-type' => 'danger'
		            );
		    	return redirect()->back()->with($notification);
		        }
                    
                   
        }else{
            $done=DB::table('companyinfo')->where('id',$id)->update($data);

		        if($done){
		        	$notification = array(
		                'message' => 'company overview  Update Successfully.',
		                'alert-type' => 'success'
		            );
		    	return redirect()->route('companyoverview')->with($notification);
		        }else{
		          $notification = array(
		                'message' => 'company overview Not  Update',
		                'alert-type' => 'danger'
		            );
		    	return redirect()->back()->with($notification);
		        }

        }

    }
}
