<?php

namespace App\Http\Controllers\Admin\CategoryImage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use DB;
use Image;
Use File;
class FortuneCtegoryImageCntroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$Cat_image=DB::table('categoryImages')->get();
        $bus_name=DB::table('categoryImages')
            ->join('fortuneCategory','categoryImages.fortune_cat_id','fortuneCategory.id')
            ->select('categoryImages.*','fortuneCategory.name')
            ->get();
    	return view('backend-page.categoryimage.addcategoryimage',compact('Cat_image','bus_name'));
    }

    public function storeimage(Request $request){
       $data=array();
       $data['fortune_cat_id']=$request->fortune_cat_id;
       $data['facebook_link']=$request->facebook_link;
       $data['webside_link']=$request->webside_link;
       $data['priority']=$request->priority;
       $image_one=$request->image_one;
       $image_two=$request->image_two;
       $image_three=$request->image_three;
       $image_four=$request->image_four;

       if ($image_one) {
       	if ($image_two) {
       		if ($image_three) {
       			if ($image_four) {
       				//image _one
       				/*$image_one_= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                    Image::make($image_one)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_one_);
                    $data['image_one']='public/public/media/CategoryGallery/'.$image_one_;*/

                    



                    //image two
                    /*$image_two_= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                    Image::make($image_two)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_two_);
                    $data['image_two']='public/public/media/CategoryGallery/'.$image_two_;*/
                    //image three
                    /*$image_three_= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                    Image::make($image_three)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_three_);
                    $data['image_three']='public/public/media/CategoryGallery/'.$image_three_;*/
                    // image four
                    /*$image_four_= hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
                    Image::make($image_four)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_four_);
                    $data['image_four']='public/public/media/CategoryGallery/'.$image_four_;*/

                    $image_one_ = Cloudinary::upload($request->file('image_one')->getRealPath(),[
                            'folder'=>'group/CategoryGallery/'
                       ])->getSecurePath();
                
                    $data['image_one']=$image_one_;

                    $image_two_ = Cloudinary::upload($request->file('image_two')->getRealPath(),[
                            'folder'=>'group/CategoryGallery/'
                       ])->getSecurePath();
                
                    $data['image_two']=$image_two_;

                    $image_three_ = Cloudinary::upload($request->file('image_three')->getRealPath(),[
                            'folder'=>'group/CategoryGallery/'
                       ])->getSecurePath();
                
                    $data['image_three']=$image_three_;


                     $image_four_ = Cloudinary::upload($request->file('image_four')->getRealPath(),[
                            'folder'=>'group/CategoryGallery/'
                       ])->getSecurePath();
                
                    $data['image_four']=$image_four_;



                    $done=DB::table('categoryImages')->insert($data);

			        if($done){
			        	$notification = array(
			                'message' => 'Image Gallery Added Successfully.',
			                'alert-type' => 'success'
			            );
			    	return redirect()->back()->with($notification);
			        }else{
			          $notification = array(
			                'message' => 'Image Gallery Not  Added',
			                'alert-type' => 'danger'
			            );
			    	return redirect()->back()->with($notification);
			        }
       			}else{
       				$notification = array(
			                'message' => 'Image Gallery Not Added.',
			                'alert-type' => 'danger'
			        );
			    	return redirect()->back()->with($notification);
       			}
       			
       		}else{
       			$notification = array(
			                'message' => 'Three Image not allowed !! Must Four Image Added.',
			                'alert-type' => 'error'
			    );
			    return redirect()->back()->with($notification);
       		}
       	}else{
          $notification = array(
			                'message' => 'Two Image not allowed !!Must Four Image Added.',
			                'alert-type' => 'error'
			    );
		 return redirect()->back()->with($notification);
       	}
       }else{
         $notification = array(
			                'message' => 'Must Four Image Added.',
			                'alert-type' => 'error'
	    );
	    return redirect()->back()->with($notification);
       }
    }

    public function Destroyimage($id){
       $images=DB::table('categoryImages')->where('id',$id)->first();
        $image_one=$images->image_one;
        $image_two=$images->image_two;
        $image_three=$images->image_three;
        $image_four=$images->image_four;
        /*unlink($image_one);
        unlink($image_two);
        unlink($image_three);
        unlink($image_four);*/
    	  $done=DB::table('categoryImages')->where('id',$id)->delete();
        
        if($done){
        	$notification = array(
                'message' => 'Image Delated Successfully.',
                'alert-type' => 'success'
            );
    	return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'Image Not  Delated.',
                'alert-type' => 'danger'
            );
    	return Redirect()->back()->with($notification);
        }
    }

    public function Editimage($id){
     $categoryImages=DB::table('categoryImages')->where('id',$id)->first();
     $fortuneCategory=DB::table('fortuneCategory')->get();
     return view('backend-page.categoryimage.editcategoryimage',compact('categoryImages','fortuneCategory'));
    }

    public function updateimage(Request $request,$id){

       $data=array();
       $data['fortune_cat_id']=$request->fortune_cat_id;
       $data['facebook_link']=$request->facebook_link;
       $data['webside_link']=$request->webside_link;
       $data['priority']=$request->priority;
       $image_one=$request->image_one;
       $image_two=$request->image_two;
       $image_three=$request->image_three;
       $image_four=$request->image_four;
        $old_image_one=$request->old_image;
        $old_image_two=$request->old_image_one;
        $old_image_three=$request->old_image_two;
        $old_image_four=$request->old_image_three;
        

       if($image_one && $image_two && $image_three && $image_four){

        $image_one_ = Cloudinary::upload($request->file('image_one')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
                
        $data['image_one']=$image_one_;

        $image_two_ = Cloudinary::upload($request->file('image_two')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
    
        $data['image_two']=$image_two_;

        $image_three_ = Cloudinary::upload($request->file('image_three')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
    
        $data['image_three']=$image_three_;


         $image_four_ = Cloudinary::upload($request->file('image_four')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
    
        $data['image_four']=$image_four_;
        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }

       }
       if($image_one && $image_two && $image_three ){

        $image_one_ = Cloudinary::upload($request->file('image_one')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
                
        $data['image_one']=$image_one_;

        $image_two_ = Cloudinary::upload($request->file('image_two')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
    
        $data['image_two']=$image_two_;

        $image_three_ = Cloudinary::upload($request->file('image_three')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
    
        $data['image_three']=$image_three_;

        
        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_one && $image_two && $image_four){
        

        $image_one_ = Cloudinary::upload($request->file('image_one')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
                
        $data['image_one']=$image_one_;

        $image_two_ = Cloudinary::upload($request->file('image_two')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
    
        $data['image_two']=$image_two_;

         $image_four_ = Cloudinary::upload($request->file('image_four')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
    
        $data['image_four']=$image_four_;
        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }

       }
       if($image_two && $image_three && $image_four){

        $image_two_ = Cloudinary::upload($request->file('image_two')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
        $data['image_two']=$image_two_;
        $image_three_ = Cloudinary::upload($request->file('image_three')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
        $data['image_three']=$image_three_;
         $image_four_ = Cloudinary::upload($request->file('image_four')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
        $data['image_four']=$image_four_;


        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_one && $image_three && $image_four){

         $image_one_ = Cloudinary::upload($request->file('image_one')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();       
        $data['image_one']=$image_one_;
        $image_three_ = Cloudinary::upload($request->file('image_three')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
        $data['image_three']=$image_three_;
         $image_four_ = Cloudinary::upload($request->file('image_four')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
        $data['image_four']=$image_four_;

        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_one && $image_two){

          $image_one_ = Cloudinary::upload($request->file('image_one')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();       
        $data['image_one']=$image_one_;
        $image_two_ = Cloudinary::upload($request->file('image_two')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
        $data['image_two']=$image_two_;

     
        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_one && $image_three){

          $image_one_ = Cloudinary::upload($request->file('image_one')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();       
        $data['image_one']=$image_one_;
        $image_three_ = Cloudinary::upload($request->file('image_three')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
        $data['image_three']=$image_three_;    

        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_one && $image_four){

          $image_one_ = Cloudinary::upload($request->file('image_one')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();       
        $data['image_one']=$image_one_;
        
         $image_four_ = Cloudinary::upload($request->file('image_four')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
        $data['image_four']=$image_four_;

        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_two && $image_three){

        $image_two_ = Cloudinary::upload($request->file('image_two')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
        $data['image_two']=$image_two_;
        $image_three_ = Cloudinary::upload($request->file('image_three')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
        $data['image_three']=$image_three_;
         

        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_two && $image_four){

         
        $image_two_ = Cloudinary::upload($request->file('image_two')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
        $data['image_two']=$image_two_;
        
         $image_four_ = Cloudinary::upload($request->file('image_four')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
        $data['image_four']=$image_four_;

        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_three && $image_four){

        $image_three_ = Cloudinary::upload($request->file('image_three')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
        $data['image_three']=$image_three_;
         $image_four_ = Cloudinary::upload($request->file('image_four')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
        $data['image_four']=$image_four_;

        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_one){

          $image_one_ = Cloudinary::upload($request->file('image_one')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();       
        $data['image_one']=$image_one_;

        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_two){

        $image_two_ = Cloudinary::upload($request->file('image_two')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
        $data['image_two']=$image_two_;
        

        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_three){

        $image_three_ = Cloudinary::upload($request->file('image_three')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
        $data['image_three']=$image_three_;
         
        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_four){

         $image_four_ = Cloudinary::upload($request->file('image_four')->getRealPath(),[
                'folder'=>'group/CategoryGallery/'
           ])->getSecurePath();
        $data['image_four']=$image_four_;

        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if(!$image_one && !$image_two && !$image_three && !$image_four){

          $done=DB::table('categoryImages')->where('id',$id)->update($data);
          if($done){
              $notification = array(
                    'message' => 'Category Image Update Successfully.',
                    'alert-type' => 'success'
                );
           return redirect()->route('category.image')->with($notification);
             }else{
              $notification = array(
                    'message' => 'Category Image Not  Update',
                    'alert-type' => 'danger'
                );
           return redirect()->back()->with($notification);
             }
        
       }

    }

    /*public function updateimage(Request $request,$id){

       $data=array();
       $data['fortune_cat_id']=$request->fortune_cat_id;
       $data['facebook_link']=$request->facebook_link;
       $data['webside_link']=$request->webside_link;
       $data['priority']=$request->priority;
       $image_one=$request->image_one;
       $image_two=$request->image_two;
       $image_three=$request->image_three;
       $image_four=$request->image_four;
        $old_image_one=$request->old_image;
        $old_image_two=$request->old_image_one;
        $old_image_three=$request->old_image_two;
        $old_image_four=$request->old_image_three;
        

       if($image_one && $image_two && $image_three && $image_four){

        unlink($old_image_one);
        unlink($old_image_two);
        unlink($old_image_three);
        unlink($old_image_four);

        //image _one
        $image_one_= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_one_);
        $data['image_one']='public/public/media/CategoryGallery/'.$image_one_;

        //image two
        $image_two_= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
        Image::make($image_two)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_two_);
        $data['image_two']='public/public/media/CategoryGallery/'.$image_two_;
        //image three
        $image_three_= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
        Image::make($image_three)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_three_);
        $data['image_three']='public/public/media/CategoryGallery/'.$image_three_;
        // image four
        $image_four_= hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
        Image::make($image_four)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_four_);
        $data['image_four']='public/public/media/CategoryGallery/'.$image_four_;
        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }

       }
       if($image_one && $image_two && $image_three ){

        unlink($old_image_one);
        unlink($old_image_two);
        unlink($old_image_three);

        //image _one
        $image_one_= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_one_);
        $data['image_one']='public/public/media/CategoryGallery/'.$image_one_;

        //image two
        $image_two_= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
        Image::make($image_two)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_two_);
        $data['image_two']='public/public/media/CategoryGallery/'.$image_two_;
        //image three
        $image_three_= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
        Image::make($image_three)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_three_);
        $data['image_three']='public/public/media/CategoryGallery/'.$image_three_;
        
        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_one && $image_two && $image_four){
        

        unlink($old_image_one);
        unlink($old_image_two);
        unlink($old_image_four);

        //image _one
        $image_one_= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_one_);
        $data['image_one']='public/public/media/CategoryGallery/'.$image_one_;

        //image two
        $image_two_= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
        Image::make($image_two)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_two_);
        $data['image_two']='public/public/media/CategoryGallery/'.$image_two_;
        // image four
        $image_four_= hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
        Image::make($image_four)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_four_);
        $data['image_four']='public/public/media/CategoryGallery/'.$image_four_;
        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }

       }
       if($image_two && $image_three && $image_four){


        unlink($old_image_two);
        unlink($old_image_three);
        unlink($old_image_four);

        //image two
        $image_two_= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
        Image::make($image_two)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_two_);
        $data['image_two']='public/public/media/CategoryGallery/'.$image_two_;
        //image three
        $image_three_= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
        Image::make($image_three)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_three_);
        $data['image_three']='public/public/media/CategoryGallery/'.$image_three_;
        // image four
        $image_four_= hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
        Image::make($image_four)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_four_);
        $data['image_four']='public/public/media/CategoryGallery/'.$image_four_;
        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_one && $image_three && $image_four){

        unlink($old_image_one);
        unlink($old_image_three);
        unlink($old_image_four);

        //image _one
        $image_one_= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_one_);
        $data['image_one']='public/public/media/CategoryGallery/'.$image_one_;
        //image three
        $image_three_= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
        Image::make($image_three)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_three_);
        $data['image_three']='public/public/media/CategoryGallery/'.$image_three_;
        // image four
        $image_four_= hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
        Image::make($image_four)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_four_);
        $data['image_four']='public/public/media/CategoryGallery/'.$image_four_;
        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_one && $image_two){

        unlink($old_image_one);
        unlink($old_image_two);


        //image _one
        $image_one_= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_one_);
        $data['image_one']='public/public/media/CategoryGallery/'.$image_one_;

        //image two
        $image_two_= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
        Image::make($image_two)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_two_);
        $data['image_two']='public/public/media/CategoryGallery/'.$image_two_;
     
        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_one && $image_three){

        unlink($old_image_one);
        unlink($old_image_three);

        //image _one
        $image_one_= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_one_);
        $data['image_one']='public/public/media/CategoryGallery/'.$image_one_;
        //image three
        $image_three_= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
        Image::make($image_three)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_three_);
        $data['image_three']='public/public/media/CategoryGallery/'.$image_three_;
        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_one && $image_four){

        unlink($old_image_one);
        unlink($old_image_four);

        //image _one
        $image_one_= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_one_);
        $data['image_one']='public/public/media/CategoryGallery/'.$image_one_;
        // image four
        $image_four_= hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
        Image::make($image_four)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_four_);
        $data['image_four']='public/public/media/CategoryGallery/'.$image_four_;
        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_two && $image_three){

        unlink($old_image_two);
        unlink($old_image_three);


        //image two
        $image_two_= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
        Image::make($image_two)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_two_);
        $data['image_two']='public/public/media/CategoryGallery/'.$image_two_;
        //image three
        $image_three_= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
        Image::make($image_three)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_three_);
        $data['image_three']='public/public/media/CategoryGallery/'.$image_three_;
        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_two && $image_four){

        unlink($old_image_two);
        unlink($old_image_four);

        //image two
        $image_two_= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
        Image::make($image_two)->resize(1200,10000)->save('public/public/media/CategoryGallery/'.$image_two_);
        $data['image_two']='public/public/media/CategoryGallery/'.$image_two_;
        // image four
        $image_four_= hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
        Image::make($image_four)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_four_);
        $data['image_four']='public/public/media/CategoryGallery/'.$image_four_;
        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_three && $image_four){

        unlink($old_image_three);
        unlink($old_image_four);
        //image three
        $image_three_= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
        Image::make($image_three)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_three_);
        $data['image_three']='public/public/media/CategoryGallery/'.$image_three_;
        // image four
        $image_four_= hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
        Image::make($image_four)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_four_);
        $data['image_four']='public/public/media/CategoryGallery/'.$image_four_;
        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_one){


        unlink($old_image_one);

        //image _one
        $image_one_= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_one_);
        $data['image_one']='public/public/media/CategoryGallery/'.$image_one_;
        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_two){

        unlink($old_image_two);
        //image two
        $image_two_= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
        Image::make($image_two)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_two_);
        $data['image_two']='public/public/media/CategoryGallery/'.$image_two_;
        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_three){

        unlink($old_image_three);
        //image three
        $image_three_= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
        Image::make($image_three)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_three_);
        $data['image_three']='public/public/media/CategoryGallery/'.$image_three_;
        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if($image_four){

        unlink($old_image_four);
        // image four
        $image_four_= hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
        Image::make($image_four)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_four_);
        $data['image_four']='public/public/media/CategoryGallery/'.$image_four_;
        $done=DB::table('categoryImages')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                  'message' => 'Category Image Update Successfully.',
                  'alert-type' => 'success'
              );
         return redirect()->route('category.image')->with($notification);
           }else{
            $notification = array(
                  'message' => 'Category Image Not  Update',
                  'alert-type' => 'danger'
              );
         return redirect()->back()->with($notification);
           }
        
       }
       if(!$image_one && !$image_two && !$image_three && !$image_four){

          $done=DB::table('categoryImages')->where('id',$id)->update($data);
          if($done){
              $notification = array(
                    'message' => 'Category Image Update Successfully.',
                    'alert-type' => 'success'
                );
           return redirect()->route('category.image')->with($notification);
             }else{
              $notification = array(
                    'message' => 'Category Image Not  Update',
                    'alert-type' => 'danger'
                );
           return redirect()->back()->with($notification);
             }
        
       }

    }*/


}
