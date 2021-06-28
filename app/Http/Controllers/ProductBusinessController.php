<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;
class ProductBusinessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function business(){
    	$fortuneCategory=DB::table('fortuneCategory')->get();
    	 $business=DB::table('business_product')
            ->join('fortuneCategory','business_product.business_id','fortuneCategory.id')
            ->select('business_product.*','fortuneCategory.name')
            ->get();
    	return view('backend-page.business_product.create',compact('business','fortuneCategory'));
    }

    public function Storebusiness(Request $request){
   
       $data=array();
       $image=$request->image;
       $data['business_id']=$request->business_id;
       $data['title']=$request->title;
       $data['description']=$request->description;

       if ($image) {
         $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(1200,1000)->save('public/public/media/fCategory/'.$image_one_name);
        $data['image']='public/public/media/fCategory/'.$image_one_name;
        $done=DB::table('business_product')->insert($data);
         if($done){
          $notification = array(
                'message' => 'Business Product Added Successfully.',
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
	public function Editbusiness($id){
        $business_product=DB::table('business_product')->where('id',$id)->first();
        $fortuneCategory=DB::table('fortuneCategory')->get();
    	return view('backend-page.business_product.edit',compact('business_product','fortuneCategory'));
	}

	public function Updatebusiness(Request $request,$id){
        $data=array();
       $old_image=$request->old_image;
       $image=$request->image;
       $data['business_id']=$request->business_id;
       $data['title']=$request->title;
       $data['description']=$request->description;
        if ($image) {
          unlink($old_image);
         $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(1200,1000)->save('public/public/media/fCategory/'.$image_one_name);
        $data['image']='public/public/media/fCategory/'.$image_one_name;
         $done=DB::table('business_product')->where('id',$id)->update($data);
          if($done){
          $notification = array(
                'message' => 'Business Product Update Successfully.',
                'alert-type' => 'success'
            );
        return redirect()->route('business_product')->with($notification);
        }else{
          $notification = array(
                'message' => 'Business Product Not  Update',
                'alert-type' => 'danger'
            );
        return redirect()->back()->with($notification);
        }
       }else{
       $done=DB::table('business_product')->where('id',$id)->update($data);
         if($done){
          $notification = array(
                'message' => 'Business Product Update Successfully.',
                'alert-type' => 'success'
            );
        return redirect()->route('business_product')->with($notification);
        }else{
          $notification = array(
                'message' => 'Business Product Not  Update',
                'alert-type' => 'danger'
            );
        return redirect()->back()->with($notification);
        }
      }  
	}


	  public function Deletebusiness($id){
        $done=DB::table('business_product')->where('id',$id)->delete();
        
        if($done){
        	$notification = array(
                'message' => 'Business Product Delated Successfully.',
                'alert-type' => 'success'
            );
    	return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'Business Product Not  Delated.',
                'alert-type' => 'danger'
            );
    	return Redirect()->back()->with($notification);
        }
    }
}
