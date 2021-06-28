<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use File;
class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(){
    	return view('backend-page.About.About');
    }
    public function AboutStore(Request $request){
      $validatedData = $request->validate([
            'shortdescription'       => 'unique:about|max:250',
            'description'            => 'unique:about|max:1000',
            'number'                 => 'unique:about|max:20',
            'title'                  => 'unique:about|max:200',
            'title_description'      => 'unique:about|max:1000',
            'achievements_details'   => 'unique:about|max:1000',

        ]);
        $data=array();
        $data['shortdescription']=$request->shortdescription;
        $data['description']=$request->description;
        $data['number']=$request->number;
        $data['title']=$request->title;
        $data['title_description']=$request->title_description;
        $data['achievements_details']=$request->achievements_details;
        $imageOne=$request->imageOne;
        $imageTwo=$request->imageTwo;
        $imageThree=$request->imageThree;

        if ($imageOne) {
        	if ($imageTwo) {
        		if ($imageThree) {
        			$image_one_name= hexdec(uniqid()).'.'.$imageOne->getClientOriginalExtension();
        			$image_two_name= hexdec(uniqid()).'.'.$imageTwo->getClientOriginalExtension();
        			$image_three_name= hexdec(uniqid()).'.'.$imageThree->getClientOriginalExtension();
                    Image::make($imageOne)->resize(400,200)->save('public/public/media/about/'.$image_one_name);
                    Image::make($imageTwo)->resize(400,200)->save('public/public/media/about/'.$image_two_name);
                    Image::make($imageThree)->resize(400,200)->save('public/public/media/about/'.$image_three_name);
                    $data['image_one']='public/public/media/about/'.$image_one_name;
	                $data['image_two']='public/public/media/about/'.$image_two_name;
	                $data['image_three']='public/public/media/about/'.$image_three_name;
                    $done=DB::table('about')->insert($data);
                    if ($done) {
                    	$notification = array(
                            'message' => 'About Added Successfully.',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    }else{
                        $notification = array(
	                        'message' => 'About Not  Added',
	                        'alert-type' => 'danger'
                        );
                        return redirect()->back()->with($notification);
                    }
        		}else{
                        $image_one_name= hexdec(uniqid()).'.'.$imageOne->getClientOriginalExtension();
                        $image_two_name= hexdec(uniqid()).'.'.$imageTwo->getClientOriginalExtension();
				        Image::make($imageOne)->resize(400,200)->save('public/public/media/about/'.$image_one_name);
				        Image::make($imageTwo)->resize(400,200)->save('public/public/media/about/'.$image_two_name);
				        $data['image_one']='public/public/media/about/'.$image_one_name;
				        $data['image_two']='public/public/media/about/'.$image_two_name;
				        $done=DB::table('about')->insert($data);
				        if ($done) {
                    	$notification = array(
                            'message' => 'About Added Successfully.',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
	                    }else{
	                        $notification = array(
		                        'message' => 'About Not  Added',
		                        'alert-type' => 'danger'
	                        );
	                        return redirect()->back()->with($notification);
	                    }
        		}

        	}else{
                $image_one_name= hexdec(uniqid()).'.'.$imageOne->getClientOriginalExtension();
		        Image::make($imageOne)->resize(400,200)->save('public/public/media/about/'.$image_one_name);
		        $data['image_one']='public/public/media/about/'.$image_one_name;
		        $done=DB::table('about')->insert($data);
		        if ($done) {
                	$notification = array(
                        'message' => 'About Added Successfully.',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                }else{
                    $notification = array(
                        'message' => 'About Not  Added',
                        'alert-type' => 'danger'
                    );
                    return redirect()->back()->with($notification);

                }
        	}

        }else if($imageTwo){
           if($imageThree){
              $image_two_name= hexdec(uniqid()).'.'.$imageTwo->getClientOriginalExtension();
              $image_three_name= hexdec(uniqid()).'.'.$imageThree->getClientOriginalExtension();
		        Image::make($imageTwo)->resize(400,200)->save('public/public/media/about/'.$image_two_name);
		        Image::make($imageThree)->resize(400,200)->save('public/public/media/about/'.$image_three_name);
		        $data['image_two']='public/public/media/about/'.$image_two_name;
		        $data['image_three']='public/public/media/about/'.$image_three_name;
		        $done=DB::table('about')->insert($data);
		        if ($done) {
                	$notification = array(
                        'message' => 'About Added Successfully.',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                }else{
                    $notification = array(
                        'message' => 'About Not  Added',
                        'alert-type' => 'danger'
                    );
                    return redirect()->back()->with($notification);
                }
           }else{
           	    $image_two_name= hexdec(uniqid()).'.'.$imageTwo->getClientOriginalExtension();
		        Image::make($imageTwo)->resize(400,200)->save('public/public/media/about/'.$image_two_name);
		        $data['image_two']='public/public/media/about/'.$image_two_name;
		        $done=DB::table('about')->insert($data);
		        if ($done) {
                	$notification = array(
                        'message' => 'About Added Successfully.',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                }else{
                    $notification = array(
                        'message' => 'About Not  Added',
                        'alert-type' => 'danger'
                    );
                    return redirect()->back()->with($notification);
                }
           }
        }else if($imageThree){
            $image_three_name= hexdec(uniqid()).'.'.$imageThree->getClientOriginalExtension();
            Image::make($imageThree)->resize(400,200)->save('public/public/media/about/'.$image_three_name);
            $data['image_three']='public/public/media/about/'.$image_three_name;
            $done=DB::table('about')->insert($data);
            if ($done) {
            	$notification = array(
                    'message' => 'About Added Successfully.',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }else{
                $notification = array(
                    'message' => 'About Not  Added',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }
        }
        else{
            $done=DB::table('about')->insert($data);
            if ($done) {
            	$notification = array(
                    'message' => 'About Added Successfully.',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }else{
                $notification = array(
                    'message' => 'About Not  Added',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }
        }



    }
    public function Allshow(){
    	$about=DB::table('about')->get();
    	return view('backend-page.About.showAllAbout',compact('about'));
    }
    public function editabout($id){
      $about=DB::table('about')->where('id',$id)->first();
        return view('backend-page.About.editabout',compact('about'));
    }

    public function updateabout(Request $request,$id){
        $data=array();
        $data['shortdescription']=$request->shortdescription;
        $data['description']=$request->description;
        $data['number']=$request->number;
        $data['title']=$request->title;
        $data['title_description']=$request->title_description;
        $data['achievements_details']=$request->achievements_details;
        $imageOne=$request->imageOne;
        $imageTwo=$request->imageTwo;
        $imageThree=$request->imageThree;
        $old_image1=$request->old_image_one;
        $old_image2=$request->old_image_two;
        $old_image3=$request->old_image_three;

        if ($imageOne) {
            if ($imageTwo) {
                if ($imageThree) {
                    unlink($old_image1);
                    unlink($old_image2);
                    unlink($old_image3);
                    $image_one_name= hexdec(uniqid()).'.'.$imageOne->getClientOriginalExtension();
                    $image_two_name= hexdec(uniqid()).'.'.$imageTwo->getClientOriginalExtension();
                    $image_three_name= hexdec(uniqid()).'.'.$imageThree->getClientOriginalExtension();
                    Image::make($imageOne)->resize(400,200)->save('public/public/media/about/'.$image_one_name);
                    Image::make($imageTwo)->resize(400,200)->save('public/public/media/about/'.$image_two_name);
                    Image::make($imageThree)->resize(400,200)->save('public/public/media/about/'.$image_three_name);
                    $data['image_one']='public/public/media/about/'.$image_one_name;
                    $data['image_two']='public/public/media/about/'.$image_two_name;
                    $data['image_three']='public/public/media/about/'.$image_three_name;
                    //$done=DB::table('about')->insert($data);
                    $done=DB::table('about')->where('id',$id)->update($data);
                    if ($done) {
                        $notification = array(
                            'message' => 'About Update Successfully.',
                            'alert-type' => 'success'
                        );
                        return redirect()->route('all.about')->with($notification);
                    }else{
                        $notification = array(
                            'message' => 'About Not  Update',
                            'alert-type' => 'danger'
                        );
                        return redirect()->back()->with($notification);
                    }
                }else{
                       unlink($old_image1);
                        unlink($old_image2);
                        $image_one_name= hexdec(uniqid()).'.'.$imageOne->getClientOriginalExtension();
                        $image_two_name= hexdec(uniqid()).'.'.$imageTwo->getClientOriginalExtension();
                        Image::make($imageOne)->resize(400,200)->save('public/public/media/about/'.$image_one_name);
                        Image::make($imageTwo)->resize(400,200)->save('public/public/media/about/'.$image_two_name);
                        $data['image_one']='public/public/media/about/'.$image_one_name;
                        $data['image_two']='public/public/media/about/'.$image_two_name;
                        $done=DB::table('about')->where('id',$id)->update($data);
                        if ($done) {
                        $notification = array(
                            'message' => 'About Update Successfully.',
                            'alert-type' => 'success'
                        );
                        return redirect()->route('all.about')->with($notification);
                        }else{
                            $notification = array(
                                'message' => 'About Not  Update',
                                'alert-type' => 'danger'
                            );
                            return redirect()->back()->with($notification);
                        }
                }

            }else{
                unlink($old_image1);
                $image_one_name= hexdec(uniqid()).'.'.$imageOne->getClientOriginalExtension();
                Image::make($imageOne)->resize(400,200)->save('public/public/media/about/'.$image_one_name);
                $data['image_one']='public/public/media/about/'.$image_one_name;
                $done=DB::table('about')->where('id',$id)->update($data);
                if ($done) {
                    $notification = array(
                        'message' => 'About Update Successfully.',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('all.about')->with($notification);
                }else{
                    $notification = array(
                        'message' => 'About Not  Update',
                        'alert-type' => 'danger'
                    );
                    return redirect()->back()->with($notification);

                }
            }

        }else if($imageTwo){
           if($imageThree){
              unlink($old_image2);
              unlink($old_image3);
              $image_two_name= hexdec(uniqid()).'.'.$imageTwo->getClientOriginalExtension();
              $image_three_name= hexdec(uniqid()).'.'.$imageThree->getClientOriginalExtension();
                Image::make($imageTwo)->resize(400,200)->save('public/public/media/about/'.$image_two_name);
                Image::make($imageThree)->resize(400,200)->save('public/public/media/about/'.$image_three_name);
                $data['image_two']='public/public/media/about/'.$image_two_name;
                $data['image_three']='public/public/media/about/'.$image_three_name;
                $done=DB::table('about')->where('id',$id)->update($data);
                if ($done) {
                    $notification = array(
                        'message' => 'About Update Successfully.',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('all.about')->with($notification);
                }else{
                    $notification = array(
                        'message' => 'About Not  Update',
                        'alert-type' => 'danger'
                    );
                    return redirect()->back()->with($notification);
                }
           }else{
                unlink($old_image2);
                $image_two_name= hexdec(uniqid()).'.'.$imageTwo->getClientOriginalExtension();
                Image::make($imageTwo)->resize(400,200)->save('public/public/media/about/'.$image_two_name);
                $data['image_two']='public/public/media/about/'.$image_two_name;
                $done=DB::table('about')->where('id',$id)->update($data);
                if ($done) {
                    $notification = array(
                        'message' => 'About Update Successfully.',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('all.about')->with($notification);
                }else{
                    $notification = array(
                        'message' => 'About Not  Update',
                        'alert-type' => 'danger'
                    );
                    return redirect()->back()->with($notification);
                }
           }
        }else if($imageThree){
            unlink($old_image3);
            $image_three_name= hexdec(uniqid()).'.'.$imageThree->getClientOriginalExtension();
            Image::make($imageThree)->resize(400,200)->save('public/public/media/about/'.$image_three_name);
            $data['image_three']='public/public/media/about/'.$image_three_name;
            $done=DB::table('about')->where('id',$id)->update($data);
            if ($done) {
                $notification = array(
                    'message' => 'About Update Successfully.',
                    'alert-type' => 'success'
                );
                return redirect()->route('all.about')->with($notification);
            }else{
                $notification = array(
                    'message' => 'About Not  Update',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }
        }
        else{
            $done=DB::table('about')->where('id',$id)->update($data);
            if ($done) {
                $notification = array(
                    'message' => 'About Update Successfully.',
                    'alert-type' => 'success'
                );
                return redirect()->route('all.about')->with($notification);
            }else{
                $notification = array(
                    'message' => 'About Not  Update',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function deleteabout($id){
        
        $done=DB::table('about')->where('id',$id)->delete();

        if($done){
            $notification = array(
                'message' => 'about Delated Successfully.',
                'alert-type' => 'success'
            );
        return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'about Not  Delated.',
                'alert-type' => 'danger'
            );
        return Redirect()->back()->with($notification);
        }
    }

    //frontend page show
    // public function aboutpage(){
    //     return view('fontend-page.about');
    // }
    // public function contactpage(){
    //     return view('fontend-page.contact');
    // }

   
   
    
}
