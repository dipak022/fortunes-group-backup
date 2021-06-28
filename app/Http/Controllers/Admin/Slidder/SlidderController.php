<?php

namespace App\Http\Controllers\Admin\Slidder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use File;
class SlidderController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function slidder(){
    	return view('backend-page.slidder.slidder');
    }
    public function StoreSlidder(Request $request){

    	$validatedData = $request->validate([
            'name'              => 'required|unique:slidder|max:1000',
            'description'       => 'required|unique:slidder|max:500',
            'short_description' => 'required|unique:slidder|max:500',
            //'btn_name'       => 'required|unique:slidder|max:50',
            'slidder_image_number'    => 'required|unique:slidder|max:20',
           
            //'logo' => 'required|Setting|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

    	$data=array();
        $data['name']=$request->name;
        $data['description']=$request->description;
        $data['short_description']=$request->short_description;
        $data['btn_name']=$request->btn_name;
        $data['slidder_image_number']=$request->slidder_image_number;

        $image=$request->slidder_image;

        if($image){

                $image_slidder= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(1200,1000)->save('public/public/media/slidder/'.$image_slidder);
                $data['slidder_image']='public/public/media/slidder/'.$image_slidder;
                $done=DB::table('slidder')->insert($data);
		        if($done){
		        	$notification = array(
		                'message' => 'slidder Added Successfully.',
		                'alert-type' => 'success'
		            );
		    	return redirect()->back()->with($notification);
		        }else{
		          $notification = array(
		                'message' => 'slidder Not  Added',
		                'alert-type' => 'danger'
		            );
		    	return redirect()->back()->with($notification);
		        }
                    
                   
        }
        else{

        	$done=DB::table('slidder')->insert($data);

		        if($done){
		        	$notification = array(
		                'message' => 'slidder Added Successfully.',
		                'alert-type' => 'success'
		            );
		    	return redirect()->back()->with($notification);
		        }else{
		          $notification = array(
		                'message' => 'slidder Not  Added',
		                'alert-type' => 'danger'
		            );
		    	return redirect()->back()->with($notification);
		        }

        }
        

    }

    public function ShowSlidder(){
    	$slidder=DB::table('slidder')->get();
    	return view('backend-page.slidder.showAllSlidder',compact('slidder'));
    }

    public function EditSlidder($id){
       $slidder=DB::table('slidder')->where('id',$id)->first();
       return view('backend-page.slidder.EditSlidder',compact('slidder')); 
    }

    public function UpdateSlidder(Request $request,$id){
    	$data=array();
        $data['name']=$request->name;
        $data['description']=$request->description;
        $data['short_description']=$request->short_description;
        $data['btn_name']=$request->btn_name;
        $data['slidder_image_number']=$request->slidder_image_number;

        $image=$request->slidder_image;
        $old_image=$request->old_image;

        if($image) {
	       	if ($old_image) {
	       		
	       		 		 $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
	                    Image::make($image)->resize(1200,1000)->save('public/public/media/slidder/'.$image_one_name);
	                   $data['slidder_image']='public/public/media/slidder/'.$image_one_name;
	                   $done=DB::table('slidder')->where('id',$id)->update($data);
	                     if($done){
		        	       $notification = array(
			                  'message' => 'slidder Update Successfully.',
			                  'alert-type' => 'success'
			               );
		    	           return redirect()->route('show.slidder')->with($notification);
				         }else{
					            $notification = array(
					                  'message' => 'slidder Not  Updated',
					                  'alert-type' => 'danger'
					              );
					    	    return redirect()->back()->with($notification);
				         }
				        
	       	}else{
	       		unlink($old_image);
		       		    $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
		                Image::make($image)->resize(1200,1000)->save('public/public/media/slidder/'.$image_one_name);
				        $data['slidder_image']='public/public/media/slidder/'.$image_one_name;
				        $done=DB::table('slidder')->where('id',$id)->update($data);
				            if($done){
					        	  $notification = array(
					                  'message' => 'slidder Update Successfully.',
					                  'alert-type' => 'success'
					              );
					    	       return redirect()->route('show.slidder')->with($notification);
					        }else{
					               $notification = array(
					                   'message' => 'slidder Not  Updated',
					                   'alert-type' => 'danger'
					                );
					    	        return redirect()->back()->with($notification);
					        }
	       		//echo "abc";
	       	 }


        }else{
        	$done=DB::table('slidder')->where('id',$id)->update($data);
	          if($done){
		        	$notification = array(
		                'message' => 'slidder Update Successfully.',
		                'alert-type' => 'success'
		            );
		    	return redirect()->route('show.slidder')->with($notification);
		        }else{
		          $notification = array(
		                'message' => 'slidder Not  Updated',
		                'alert-type' => 'danger'
		            );
		    	    return redirect()->back()->with($notification);
		        }
        }
    }

    public function DeleteSlidder($id){
    	$images=DB::table('slidder')->where('id',$id)->first();
        $image=$images->slidder_image;
        unlink($image);
      $done=DB::table('slidder')->where('id',$id)->delete();
        
        if($done){
        	$notification = array(
                'message' => 'slidder Delated Successfully.',
                'alert-type' => 'success'
            );
    	return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'slidder Not  Delated.',
                'alert-type' => 'danger'
            );
    	return Redirect()->back()->with($notification);
        }
    }
    // company slidder start
    public function companyslidder(){
        $fortuneCategory=DB::table('fortuneCategory')->get();
    	 $businesslider=DB::table('business_slider')
            ->join('fortuneCategory','business_slider.slider_id','fortuneCategory.id')
            ->select('business_slider.*','fortuneCategory.name')
            ->get();
    	return view('backend-page.companyslider.create',compact('businesslider','fortuneCategory'));
    	
    }
    
  public function StorecompanySlidder(Request $request){
   
       $data=array();
       $image=$request->image;
       $data['slider_id']=$request->slider_id;

       if ($image) {
         $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(1200,1000)->save('public/public/media/fCategory/'.$image_one_name);
        $data['image']='public/public/media/fCategory/'.$image_one_name;
        $done=DB::table('business_slider')->insert($data);
         if($done){
          $notification = array(
                'message' => 'Business slider Added Successfully.',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'Business Product Not  Added',
                'alert-type' => 'danger'
            );
        return redirect()->back()->with($notification);
        }
       }else{
       	$notification = array(
                'message' => 'Business Image Must be Added',
                'alert-type' => 'warning'
            );
        return redirect()->back()->with($notification);
       }

	}
	
		public function EditcompanySlidder($id){
        $business_slider=DB::table('business_slider')->where('id',$id)->first();
        $fortuneCategory=DB::table('fortuneCategory')->get();
    	return view('backend-page.companyslider.edit',compact('business_slider','fortuneCategory'));
	}
	
	public function UpdatecompanySlidder(Request $request,$id){
        $data=array();
       $old_image=$request->old_image;
       $image=$request->image;
       $data['slider_id']=$request->slider_id;
        if ($image) {
          unlink($old_image);
         $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(1200,1000)->save('public/public/media/fCategory/'.$image_one_name);
        $data['image']='public/public/media/fCategory/'.$image_one_name;
         $done=DB::table('business_slider')->where('id',$id)->update($data);
          if($done){
          $notification = array(
                'message' => 'Business Slider Update Successfully.',
                'alert-type' => 'success'
            );
        return redirect()->route('companyslidder')->with($notification);
        }else{
          $notification = array(
                'message' => 'Business Slider Not  Update',
                'alert-type' => 'danger'
            );
        return redirect()->back()->with($notification);
        }
       }else{
       $done=DB::table('business_slider')->where('id',$id)->update($data);
         if($done){
          $notification = array(
                'message' => 'Business Slider Update Successfully.',
                'alert-type' => 'success'
            );
        return redirect()->route('companyslidder')->with($notification);
        }else{
          $notification = array(
                'message' => 'Business Slider Not  Update',
                'alert-type' => 'danger'
            );
        return redirect()->back()->with($notification);
        }
      }  
	}


	  public function DeletecompanySlidder($id){
        $done=DB::table('business_slider')->where('id',$id)->delete();
        
        if($done){
        	$notification = array(
                'message' => 'Business Slider Delated Successfully.',
                'alert-type' => 'success'
            );
    	return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'Business Slider Not  Delated.',
                'alert-type' => 'danger'
            );
    	return Redirect()->back()->with($notification);
        }
    }
}
