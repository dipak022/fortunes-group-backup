<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;
use File;
class AwardAchievementController extends Controller
{

	 public function __construct()
    {
        $this->middleware('auth');
    }
    public function achievement(){
        $achievement=DB::table('award_achievement')->get();
        return view('backend-page.achievement.achievement',compact('achievement'));
    }

    public function storeachievement(Request $request){
         $data=array();
         $image=$request->image;
          if($image){
                $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(1200,1000)->save('public/public/media/banker/'.$image_one_name);
                $data['image']='public/public/media/banker/'.$image_one_name;
                
                $done=DB::table('award_achievement')->insert($data);

                if($done){
                    $notification = array(
                        'message' => 'achievement Added Successfully.',
                        'alert-type' => 'success'
                    );
                return redirect()->back()->with($notification);
                }else{
                  $notification = array(
                        'message' => 'achievement Not  Added',
                        'alert-type' => 'danger'
                    );
                return redirect()->back()->with($notification);
                }
                    
                   
        }else{
             $notification = array(
                        'message' => 'achievement image must be added',
                        'alert-type' => 'danger'
                    );
                return redirect()->back()->with($notification);
        }
        
    }
     public function deleteachievement($id){
        $images=DB::table('award_achievement')->where('id',$id)->first();
        $image=$images->image;
        unlink($image);
          $done=DB::table('award_achievement')->where('id',$id)->delete();
        
        if($done){
            $notification = array(
                'message' => 'achievement Delated Successfully.',
                'alert-type' => 'success'
            );
        return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'achievement Not  Delated.',
                'alert-type' => 'danger'
            );
        return Redirect()->back()->with($notification);
        }
    }
     public function editachievement($id){
        $achievement=DB::table('award_achievement')->where('id',$id)->first();
        return view('backend-page.achievement.editachievement',compact('achievement'));
    }

    public function updateachievement(Request $request,$id){
        $image=$request->image;
        $old_image=$request->old_image;

        if($image){
            unlink($old_image);
            $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200,1000)->save('public/public/media/banker/'.$image_one_name);
            $data['image']='public/public/media/banker/'.$image_one_name;
            $done=DB::table('award_achievement')->where('id',$id)->update($data);
            if($done){
                $notification = array(
                    'message' => 'achievement update Successfully.',
                    'alert-type' => 'success'
                );
            return redirect()->route("achievement")->with($notification);
            }else{
              $notification = array(
                    'message' => 'achievement Not  update',
                    'alert-type' => 'danger'
                );
            return redirect()->back()->with($notification);
            }
                
               
    }else{
        $notification = array(
            'message' => 'please no change !! please image Change',
            'alert-type' => 'danger'
        );
    return redirect()->back()->with($notification);
    }
  }

  // tvc_av controller here 
  public function tvc_av(){
    	$tvc_av=DB::table('tvc_av')->get();
    	return view('backend-page.tvc_av.tvc', compact('tvc_av'));
    }

    public function storetvc_av(Request $request){
      $data=array();
        $data['vedio_link']=$request->vedio_link;
        $done=DB::table('tvc_av')->insert($data);
        if($done){
        	$notification = array(
                'message' => 'tvc Added Successfully.',
                'alert-type' => 'success'
            );
    	return redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'tvc Not  Added',
                'alert-type' => 'danger'
            );
    	return redirect()->back()->with($notification);
        }
    }

    public function edittvc($id){
     $tvc_av=DB::table('tvc_av')->where('id',$id)->first();
       return view('backend-page.tvc_av.edittvc',compact('tvc_av'));
    }

    public function updatetvc(Request $request,$id){
      $data=array();
        $data['vedio_link']=$request->vedio_link;
        $done=DB::table('tvc_av')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                'message' => 'Tvc Update Successfully.',
                'alert-type' => 'success'
            );
        return redirect()->route('tvc_av')->with($notification);
        }else{
          $notification = array(
                'message' => 'Tvc Not  update',
                'alert-type' => 'danger'
            );
        return redirect()->back()->with($notification);
        }
    }
    public function deletetvc($id){
      $done=DB::table('tvc_av')->where('id',$id)->delete();
        if($done){
            $notification = array(
                'message' => 'Tvc Delete Successfully.',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'Tvc Not  Delete',
                'alert-type' => 'danger'
            );
        return redirect()->back()->with($notification);
        }
    }

    //prassad controller here

      public function prassad(){
        $prassad=DB::table('prassad')->get();
        return view('backend-page.prassad.prassad',compact('prassad'));
    }

    public function storeprassad(Request $request){
         $data=array();
         $image=$request->image;
          if($image){
                $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(1200,1000)->save('public/public/media/banker/'.$image_one_name);
                $data['image']='public/public/media/banker/'.$image_one_name;
                
                $done=DB::table('prassad')->insert($data);

                if($done){
                    $notification = array(
                        'message' => 'prass ad Added Successfully.',
                        'alert-type' => 'success'
                    );
                return redirect()->back()->with($notification);
                }else{
                  $notification = array(
                        'message' => 'prass ad Not  Added',
                        'alert-type' => 'danger'
                    );
                return redirect()->back()->with($notification);
                }
                    
                   
        }else{
             $notification = array(
                        'message' => 'prass ad image must be added',
                        'alert-type' => 'danger'
                    );
                return redirect()->back()->with($notification);
        }
        
    }
     public function deleteprassad($id){
        $images=DB::table('prassad')->where('id',$id)->first();
        $image=$images->image;
        unlink($image);
          $done=DB::table('prassad')->where('id',$id)->delete();
        
        if($done){
            $notification = array(
                'message' => 'prass ad Delated Successfully.',
                'alert-type' => 'success'
            );
        return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'prass ad Not  Delated.',
                'alert-type' => 'danger'
            );
        return Redirect()->back()->with($notification);
        }
    }
     public function editprassad($id){
        $prassad=DB::table('prassad')->where('id',$id)->first();
        return view('backend-page.prassad.editprassad',compact('prassad'));

    }

    public function updateprassad(Request $request,$id){
        $image=$request->image;
        $old_image=$request->old_image;

        if($image){
            unlink($old_image);
            $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200,1000)->save('public/public/media/banker/'.$image_one_name);
            $data['image']='public/public/media/banker/'.$image_one_name;
            $done=DB::table('prassad')->where('id',$id)->update($data);
            if($done){
                $notification = array(
                    'message' => 'prass ad update Successfully.',
                    'alert-type' => 'success'
                );
            return redirect()->route("prassad")->with($notification);
            }else{
              $notification = array(
                    'message' => 'prass ad Not  update',
                    'alert-type' => 'danger'
                );
            return redirect()->back()->with($notification);
            }
                
               
    }else{
        $notification = array(
            'message' => 'please no change !! please image Change',
            'alert-type' => 'danger'
        );
    return redirect()->back()->with($notification);
    }
  }

}
