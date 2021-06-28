<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use File;

use Mail;
use Session;
USE Validator;
use Redirect;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Setting(){
    	return view('backend-page.setting.setting');
    }
    public function StoreSetting(Request $request){
      
       $validatedData = $request->validate([
            'mobile_number' => 'required|unique:Setting|max:20|min:11',
            'text'          => 'required|unique:Setting|max:200',
            'email'         => 'required|unique:Setting|max:50',
            'address'       => 'required|unique:Setting|max:250',
            'coppyright'    => 'required|unique:Setting|max:20',
            'fb_link'       => 'required|unique:Setting|max:50',
            'tw_link'       => 'required|unique:Setting|max:50',
            'lind_link'     => 'required|unique:Setting|max:50',
            'instra_link'   => 'required|unique:Setting|max:50',
            //'logo' => 'required|Setting|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data=array();
        $data['mobile_number']=$request->mobile_number;
        $data['text']=$request->text;
        $data['email']=$request->email;
        $data['address']=$request->address;
        $data['coppyright']=$request->coppyright;
        $data['shedule']=$request->shedule;
        $data['fb_link']=$request->fb_link;
        $data['tw_link']=$request->tw_link;
        $data['lind_link']=$request->lind_link;
        $data['instra_link']=$request->instra_link;
        $data['time']=1;

        $image=$request->logo;

        if($image){
            // $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            //     Image::make($image)->resize(400,300)->save('public/media/logo/'.$image_name);
            //     $data['logo']='public/media/logo/'.$image_name;
                $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(100,80)->save('public/public/media/logo/'.$image_one_name);
                $data['logo']='public/public/media/logo/'.$image_one_name;

    
                
                $done=DB::table('Setting')->insert($data);

		        if($done){
		        	$notification = array(
		                'message' => 'Fontend Setting Added Successfully.',
		                'alert-type' => 'success'
		            );
		    	return redirect()->back()->with($notification);
		        }else{
		          $notification = array(
		                'message' => 'Fontend Setting Not  Added',
		                'alert-type' => 'danger'
		            );
		    	return redirect()->back()->with($notification);
		        }
                    
                   
        }
        else{

        	$done=DB::table('Setting')->insert($data);

		        if($done){
		        	$notification = array(
		                'message' => 'Fontend Setting Added Successfully.',
		                'alert-type' => 'success'
		            );
		    	return redirect()->back()->with($notification);
		        }else{
		          $notification = array(
		                'message' => 'Fontend Setting Not  Added',
		                'alert-type' => 'danger'
		            );
		    	return redirect()->back()->with($notification);
		        }

        }
        

    }

    public function ShowSetting(){
    	$setting=DB::table('Setting')->get();
    	return view('backend-page.setting.showAllSetting',compact('setting'));
    }

      // inactive product 
    public function InactiveSetting($id){

       DB::table('Setting')->where('id',$id)->update(['time'=>0]);
        return Redirect()->back(); 

    } 
    public function ActiveSetting($id){

    	  DB::table('Setting')->where('id',$id)->update(['time'=>1]);
        return Redirect()->back(); 
    	
    }

    public function EditSettingy($id){
    
     $setting=DB::table('Setting')->where('id',$id)->first();
     return view('backend-page.setting.EditSetting',compact('setting')); 

    }

    public function UpdateSetting(Request $request,$id){

        $data=array();
        $old_image=$request->old_image;
        $image=$request->logo;
        $data['mobile_number']=$request->mobile_number;
        $data['text']=$request->text;
        $data['email']=$request->email;
        $data['address']=$request->address;
        $data['coppyright']=$request->coppyright;
        $data['fb_link']=$request->fb_link;
        $data['tw_link']=$request->tw_link;
        $data['lind_link']=$request->lind_link;
        $data['instra_link']=$request->instra_link;
        //$data['time']=1;

	       if($image) {
	       	if ($old_image) {
	       		// unlink($old_image);
	       		 		 $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
	               Image::make($image)->resize(100,80)->save('public/public/media/logo/'.$image_one_name);
	             $data['logo']='public/public/media/logo/'.$image_one_name;
	             $done=DB::table('Setting')->where('id',$id)->update($data);
	                if($done){
		        	    $notification = array(
			                'message' => 'Fontend Setting Update Successfully.',
			                'alert-type' => 'success'
			            );
		    	        return redirect()->route('show.setting')->with($notification);
		        }else{
			            $notification = array(
			                  'message' => 'Fontend Setting Not  Updated',
			                  'alert-type' => 'danger'
			              );
			    	    return redirect()->back()->with($notification);
		        }
		        //echo "string abc";
	       	}else{
	       		unlink($old_image);
		       		    $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
		                Image::make($image)->resize(150,80)->save('public/public/media/logo/'.$image_one_name);
				        $data['logo']='public/public/media/logo/'.$image_one_name;
				        $done=DB::table('Setting')->where('id',$id)->update($data);
				            if($done){
					        	  $notification = array(
					                  'message' => 'Fontend Setting Update Successfully.',
					                  'alert-type' => 'success'
					              );
					    	       return redirect()->route('show.setting')->with($notification);
					        }else{
					               $notification = array(
					                   'message' => 'Fontend Setting Not  Updated',
					                   'alert-type' => 'danger'
					                );
					    	        return redirect()->back()->with($notification);
					        }
	       		//echo "abc";
	       	 }
	       
	      

        }else{
        	$done=DB::table('Setting')->where('id',$id)->update($data);
	          if($done){
		        	$notification = array(
		                'message' => 'Fontend Setting Update Successfully.',
		                'alert-type' => 'success'
		            );
		    	return redirect()->route('show.setting')->with($notification);
		        }else{
		          $notification = array(
		                'message' => 'Fontend Setting Not  Updated',
		                'alert-type' => 'danger'
		            );
		    	    return redirect()->back()->with($notification);
		        }
        }

    }
    public function DeleteSetting($id){
        $images=DB::table('Setting')->where('id',$id)->first();
        $image=$images->logo;
        unlink($image);
        $done=DB::table('Setting')->where('id',$id)->delete();
        
        if($done){
        	$notification = array(
                'message' => 'Setting Delated Successfully.',
                'alert-type' => 'success'
            );
    	return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'Setting Not  Delated.',
                'alert-type' => 'danger'
            );
    	return Redirect()->back()->with($notification);
        }
    }    

        
    


}
