<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;
use File;
class profileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile(){
        $profil=DB::table('profil')->get();
    	return view('backend-page.profile.profile',compact('profil'));
    }
    public function storeprofile(Request $request){
       $data=array();
       $data['name']=$request->name;
       $data['position']=$request->position;
       $data['description']=$request->description;
       $image=$request->image;
       $image_one=$request->image_one;
       $image_two=$request->image_two;
       $image_three=$request->image_three;
       $image_four=$request->image_four;
       if($image){
       if ($image_one) {
       	if ($image_two) {
       		if ($image_three) {
       			if ($image_four) {
       			    //image _one
       				$images= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                    Image::make($image)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$images);
                    $data['image']='public/public/media/CategoryGallery/'.$images;
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
                    $done=DB::table('profil')->insert($data);

			        if($done){
			        	$notification = array(
			                'message' => 'profil Added Successfully.',
			                'alert-type' => 'success'
			            );
			    	return redirect()->back()->with($notification);
			        }else{
			          $notification = array(
			                'message' => 'profil Not  Added',
			                'alert-type' => 'danger'
			            );
			    	return redirect()->back()->with($notification);
			        }
       			}else{
       				$notification = array(
			                'message' => 'profil Not Added.',
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
    }else{
        $notification = array(
			                'message' => 'Must Four Image Added.',
			                'alert-type' => 'error'
	    );
	    return redirect()->back()->with($notification);
    }
    }
    
    
       public function deleteprofile($id){
       $images=DB::table('profil')->where('id',$id)->first();
        $image=$images->image;
        $image_one=$images->image_one;
        $image_two=$images->image_two;
        $image_three=$images->image_three;
        $image_four=$images->image_four;
        unlink($image_one);
        unlink($image_two);
        unlink($image_three);
        unlink($image_four);
    	  $done=DB::table('profil')->where('id',$id)->delete();
        
        if($done){
        	$notification = array(
                'message' => 'profil Delated Successfully.',
                'alert-type' => 'success'
            );
    	return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'profil Not  Delated.',
                'alert-type' => 'danger'
            );
    	return Redirect()->back()->with($notification);
        }
    }
    
        public function editprofile($id){
        $profile=DB::table('profil')->where('id',$id)->first();
    	return view('backend-page.profile.editprofile',compact('profile'));

    }

    public function updateprofile(Request $request,$id){
        $data=array();
        $image=$request->image;
        $image_one=$request->image_one;
        $image_two=$request->image_two;
        $image_three=$request->image_three;
        $image_four=$request->image_four;
        $old_image=$request->old_image;
        $old_image_one=$request->old_image_one;
        $old_image_two=$request->old_image_two;
        $old_image_three=$request->old_image_three;
        $old_image_four=$request->old_image_four;
        
        $data['name']=$request->name;
        $data['position']=$request->position;
        $data['description']=$request->description;

    
        
        if($image && $image_one && $image_two && $image_three && $image_four){

            unlink($old_image);
            unlink($old_image_one);
            unlink($old_image_two);
            unlink($old_image_three);
            unlink($old_image_four);
 
            $images= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                    Image::make($image)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$images);
                    $data['image']='public/public/media/CategoryGallery/'.$images;
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
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
                            'alert-type' => 'danger'
                        );
                    return redirect()->back()->with($notification);
                    }
         
        }

        if($image && $image_one && $image_two && $image_three){

            unlink($old_image);
            unlink($old_image_one);
            unlink($old_image_two);
            unlink($old_image_three);
            

            $images= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                    Image::make($image)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$images);
                    $data['image']='public/public/media/CategoryGallery/'.$images;
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
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
                            'alert-type' => 'danger'
                        );
                    return redirect()->back()->with($notification);
                    }
                   

        }
        if($image && $image_one && $image_two){
            unlink($old_image);
            unlink($old_image_one);
            unlink($old_image_two);
           

            $images= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                    Image::make($image)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$images);
                    $data['image']='public/public/media/CategoryGallery/'.$images;
       				//image _one
       				$image_one_= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                    Image::make($image_one)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_one_);
                    $data['image_one']='public/public/media/CategoryGallery/'.$image_one_;

                    //image two
                    $image_two_= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                    Image::make($image_two)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_two_);
                    $data['image_two']='public/public/media/CategoryGallery/'.$image_two_;
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
                            'alert-type' => 'danger'
                        );
                    return redirect()->back()->with($notification);
                    }
                   

        }
        if($image && $image_one && $image_three){
            unlink($old_image);
            unlink($old_image_one);
            
            unlink($old_image_three);
            

            $images= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                    Image::make($image)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$images);
                    $data['image']='public/public/media/CategoryGallery/'.$images;
       				//image _one
       				$image_one_= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                    Image::make($image_one)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_one_);
                    $data['image_one']='public/public/media/CategoryGallery/'.$image_one_;

                   
                    //image three
                    $image_three_= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                    Image::make($image_three)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_three_);
                    $data['image_three']='public/public/media/CategoryGallery/'.$image_three_;
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
                            'alert-type' => 'danger'
                        );
                    return redirect()->back()->with($notification);
                    }
                  

        }
        if($image && $image_one && $image_four){
            unlink($old_image);
            unlink($old_image_one);
            unlink($old_image_four);

            $images= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                    Image::make($image)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$images);
                    $data['image']='public/public/media/CategoryGallery/'.$images;
       				//image _one
       				$image_one_= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                    Image::make($image_one)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_one_);
                    $data['image_one']='public/public/media/CategoryGallery/'.$image_one_;
                    // image four
                    $image_four_= hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
                    Image::make($image_four)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_four_);
                    $data['image_four']='public/public/media/CategoryGallery/'.$image_four_;
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
                            'alert-type' => 'danger'
                        );
                    return redirect()->back()->with($notification);
                    }

        }
        if($image && $image_two && $image_three){
            unlink($old_image);
            unlink($old_image_two);
            unlink($old_image_three);

            $images= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                    Image::make($image)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$images);
                    $data['image']='public/public/media/CategoryGallery/'.$images;
       				

                    //image two
                    $image_two_= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                    Image::make($image_two)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_two_);
                    $data['image_two']='public/public/media/CategoryGallery/'.$image_two_;
                    //image three
                    $image_three_= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                    Image::make($image_three)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_three_);
                    $data['image_three']='public/public/media/CategoryGallery/'.$image_three_;
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
                            'alert-type' => 'danger'
                        );
                    return redirect()->back()->with($notification);
                    }
                  

        }
        if($image && $image_two && $image_four){
            unlink($old_image);
            unlink($old_image_two);
            unlink($old_image_four);

            $images= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                    Image::make($image)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$images);
                    $data['image']='public/public/media/CategoryGallery/'.$images;
       				

                    //image two
                    $image_two_= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                    Image::make($image_two)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_two_);
                    $data['image_two']='public/public/media/CategoryGallery/'.$image_two_;
                    // image four
                    $image_four_= hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
                    Image::make($image_four)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_four_);
                    $data['image_four']='public/public/media/CategoryGallery/'.$image_four_;
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
                            'alert-type' => 'danger'
                        );
                    return redirect()->back()->with($notification);
                    }

        }
        if($image_one  && $image_three && $image_four){
         
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
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
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
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
                            'alert-type' => 'danger'
                        );
                    return redirect()->back()->with($notification);
                    }

        }
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
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
                            'alert-type' => 'danger'
                        );
                    return redirect()->back()->with($notification);
                    }

        }
        if($image_one && $image_two && $image_three){
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
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
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
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
                            'alert-type' => 'danger'
                        );
                    return redirect()->back()->with($notification);
                    }

        }
       
        if($image && $image_two && $image_three && $image_four){
            unlink($old_image);
            unlink($old_image_two);
            unlink($old_image_three);
            unlink($old_image_four);
            // image 
            $images= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                    Image::make($image)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$images);
                    $data['image']='public/public/media/CategoryGallery/'.$images;
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
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
                            'alert-type' => 'danger'
                        );
                    return redirect()->back()->with($notification);
                    }
         
        }
        if($image && $image_one){
            unlink($old_image);
            unlink($old_image_one);
         

            $images= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                    Image::make($image)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$images);
                    $data['image']='public/public/media/CategoryGallery/'.$images;
       				//image _one
       				$image_one_= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                    Image::make($image_one)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_one_);
                    $data['image_one']='public/public/media/CategoryGallery/'.$image_one_;
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
                            'alert-type' => 'danger'
                        );
                    return redirect()->back()->with($notification);
                    }


        }
        
    
        if($image && $image_two){
            unlink($old_image);
           
            unlink($old_image_two);
          

       				// image 
                       $images= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                       Image::make($image)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$images);
                       $data['image']='public/public/media/CategoryGallery/'.$images;

                    //image two
                    $image_two_= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                    Image::make($image_two)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_two_);
                    $data['image_two']='public/public/media/CategoryGallery/'.$image_two_;
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
                            'alert-type' => 'danger'
                        );
                    return redirect()->back()->with($notification);
                    }
                 

        }
        if($image && $image_three){

                    unlink($old_image);
                    unlink($old_image_three);
                    //image
       				$images= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                    Image::make($image)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$images);
                    $data['image']='public/public/media/CategoryGallery/'.$images;
                    //image three
                    $image_three_= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                    Image::make($image_three)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_three_);
                    $data['image_three']='public/public/media/CategoryGallery/'.$image_three_;
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
                            'alert-type' => 'danger'
                        );
                    return redirect()->back()->with($notification);
                    }
            

        }
        if($image && $image_four){

            unlink($old_image);
                    unlink($old_image_four);
                    //image
       				$images= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                    Image::make($image)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$images);
                    $data['image']='public/public/media/CategoryGallery/'.$images;
                    // image four
                    $image_four_= hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
                    Image::make($image_four)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_four_);
                    $data['image_four']='public/public/media/CategoryGallery/'.$image_four_;
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
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
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
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
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
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
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
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
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
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
                    Image::make($image_two)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_two_);
                    $data['image_two']='public/public/media/CategoryGallery/'.$image_two_;
                    // image four
                    $image_four_= hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
                    Image::make($image_four)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$image_four_);
                    $data['image_four']='public/public/media/CategoryGallery/'.$image_four_;
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
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
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
                            'alert-type' => 'danger'
                        );
                    return redirect()->back()->with($notification);
                    }

        }
   
        if($image){
            unlink($old_image);
                    //image
       				$images= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                    Image::make($image)->resize(1200,1000)->save('public/public/media/CategoryGallery/'.$images);
                    $data['image']='public/public/media/CategoryGallery/'.$images;
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
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
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
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
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
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
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
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
                    $done=DB::table('profil')->where('id',$id)->update($data);

                    if($done){
                        $notification = array(
                            'message' => 'Profile Update Successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect()->route('addprofile')->with($notification);
                    }else{
                      $notification = array(
                            'message' => 'Profile Not  Update',
                            'alert-type' => 'danger'
                        );
                    return redirect()->back()->with($notification);
                    }
        }
        if(!$image && !$image_one && !$image_two && !$image_three && !$image_four){

            $done=DB::table('profil')->where('id',$id)->update($data);

		        if($done){
		        	$notification = array(
		                'message' => 'Profile Update Successfully.',
		                'alert-type' => 'success'
		            );
		    	return redirect()->route('addprofile')->with($notification);
		        }else{
		          $notification = array(
		                'message' => 'Profile Not  Update',
		                'alert-type' => 'danger'
		            );
		    	return redirect()->back()->with($notification);
		        }
     

        }


    }
    
    
    
    
    
    
    //showjobinfo
      public function showjobinfo(){
        $jobinfo=DB::table('jobinfo')->get();
    	return view('backend-page.jobinfo.jobinfo',compact('jobinfo'));
    }
    public function showjob($id){
        $jobinfo=DB::table('jobinfo')->where('id',$id)->first();
    	return view('backend-page.jobinfo.showinfo',compact('jobinfo'));
    }
       public function deletejob($id){
      
    	  $done=DB::table('jobinfo')->where('id',$id)->delete();
        
        if($done){
        	$notification = array(
                'message' => 'jobinfo Delated Successfully.',
                'alert-type' => 'success'
            );
    	return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'jobinfo Not  Delated.',
                'alert-type' => 'danger'
            );
    	return Redirect()->back()->with($notification);
        }
    }
    
    
}
