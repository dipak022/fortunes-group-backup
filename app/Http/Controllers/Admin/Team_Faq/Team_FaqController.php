<?php

namespace App\Http\Controllers\Admin\Team_Faq;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use File;
class Team_FaqController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(){
      return view('backend-page.Team_Faq.Team_Faq');
    }public function createfaq(){
      return view('backend-page.Team_Faq.Faq');
    }

   public function storeteam(Request $request){
    $validatedData = $request->validate([
            'name'              => 'required|unique:Team|max:200',
            'position'          => 'required|unique:Team|max:50',
            /*'short_description' => 'required|unique:Team|max:300',
            'fb_link'           => 'required|unique:Team|max:100',
            'telegram_link'     => 'required|unique:Team|max:100',
            'instra_link'       => 'required|unique:Team|max:100',*/
            //'logo' => 'required|Setting|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

   	$data=array();
        $data['name']=$request->name;
        $data['position']=$request->position;
        $data['short_description']=$request->short_description;
        $data['fb_link']=$request->fb_link;
        $data['telegram_link']=$request->telegram_link;
        $data['instra_link']=$request->instra_link;
        $data['priority']=$request->priority;
        //$data['name']=$request->name;
        $image=$request->image;

        if($image){
                $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(100,80)->save('public/public/media/Team/'.$image_one_name);
                $data['image']='public/public/media/Team/'.$image_one_name;

    
                
                $done=DB::table('Team')->insert($data);

		        if($done){
		        	$notification = array(
		                'message' => 'Image Team Added Successfully.',
		                'alert-type' => 'success'
		            );
		    	return redirect()->back()->with($notification);
		        }else{
		          $notification = array(
		                'message' => 'Image Team Not  Added',
		                'alert-type' => 'danger'
		            );
		    	return redirect()->back()->with($notification);
		        }
                    
                   
        }

   }

   public function showallTeam(){
   	$team=DB::table('Team')->orderBy('id','ASC')->get();
    return view('backend-page.Team_Faq.showAllTeam',compact('team'));
   } 

   public function EditTeam($id){
    $team=DB::table('Team')->where('id',$id)->first();
    return view('backend-page.Team_Faq.editTeam',compact('team'));
   }

   public function UpdateTeam(Request $request,$id){
    
     $data=array();
        $data['name']=$request->name;
        $data['position']=$request->position;
        $data['short_description']=$request->short_description;
        $data['fb_link']=$request->fb_link;
        $data['telegram_link']=$request->telegram_link;
        $data['instra_link']=$request->instra_link;
        $data['name']=$request->name;
        $data['priority']=$request->priority;
        $image=$request->image;
        $old_image=$request->old_image;
        if($image){
          unlink($old_image);
          $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(100,80)->save('public/public/media/Team/'.$image_one_name);
                $data['image']='public/public/media/Team/'.$image_one_name;

    
                
            $done=DB::table('Team')->where('id',$id)->update($data);

            if($done){
              $notification = array(
                    'message' => 'Team Update Successfully.',
                    'alert-type' => 'success'
                );
          return redirect()->route('all.Team')->with($notification);
            }else{
              $notification = array(
                    'message' => 'Team Not Update  Added',
                    'alert-type' => 'danger'
                );
          return redirect()->back()->with($notification);
            }
        }else{
              $done=DB::table('Team')->where('id',$id)->update($data);

            if($done){
              $notification = array(
                    'message' => 'Team Update Successfully.',
                    'alert-type' => 'success'
                );
          return redirect()->route('all.Team')->with($notification);
            }else{
              $notification = array(
                    'message' => 'Team Not Update ',
                    'alert-type' => 'danger'
                );
          return redirect()->back()->with($notification);
            }
        }
   }

   public function DeleteTeam($id){
    $images=DB::table('Team')->where('id',$id)->first();
        $image=$images->image;
        unlink($image);
      $done=DB::table('Team')->where('id',$id)->delete();
        
        if($done){
          $notification = array(
                'message' => 'Delated Successfully.',
                'alert-type' => 'success'
            );
      return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'Not  Delated.',
                'alert-type' => 'danger'
            );
      return Redirect()->back()->with($notification);
        }
   }
//  faq controller 



   public function storefaq(Request $request){
     $validatedData = $request->validate([
            'title'          => 'required|unique:Faq|max:2000',
            'description'    => 'required|unique:Faq|max:5000',
           
        ]);
      
      $data=array();
        $data['title']=$request->title;
        $data['description']=$request->description;
        $image=$request->image;

       /* if($image){
                $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(100,80)->save('public/public/media/faq/'.$image_one_name);
                $data['image']='public/public/media/faq/'.$image_one_name;
           $done=DB::table('Faq')->insert($data);

            if($done){
            	$notification = array(
                    'message' => 'Image Faq Added Successfully.',
                    'alert-type' => 'success'
                );
        	return redirect()->back()->with($notification);
            }else{
              $notification = array(
                    'message' => 'Image Faq Not  Added',
                    'alert-type' => 'danger'
                );
        	return redirect()->back()->with($notification);
            }
      }*/
      $done=DB::table('Faq')->insert($data);
      if($done){
              $notification = array(
                    'message' => 'Faq Added Successfully.',
                    'alert-type' => 'success'
                );
          return redirect()->back()->with($notification);
            }else{
              $notification = array(
                    'message' => 'Faq Not  Added',
                    'alert-type' => 'danger'
                );
          return redirect()->back()->with($notification);
            }
   }

   public function showallFaq(){
   	$faq=DB::table('Faq')->get();
    return view('backend-page.Team_Faq.showAllFaq',compact('faq'));
   }

   public function EditFaq($id){
      $faq=DB::table('Faq')->where('id',$id)->first();
    return view('backend-page.Team_Faq.editFaq',compact('faq'));
   }

   public function UpdateFaq(Request $request,$id){
    $data['title']=$request->title;
        $data['description']=$request->description;
      $done=DB::table('Faq')->where('id',$id)->update($data);

            if($done){
              $notification = array(
                    'message' => 'Update Successfully.',
                    'alert-type' => 'success'
                );
          return redirect()->route('all.Faq')->with($notification);
            }else{
              $notification = array(
                    'message' => 'Not Update ',
                    'alert-type' => 'danger'
                );
          return redirect()->back()->with($notification);
            }
   }

   public function DeleteFaq($id){

    $done=DB::table('Faq')->where('id',$id)->delete();
        
        if($done){
          $notification = array(
                'message' => 'Delated Successfully.',
                'alert-type' => 'success'
            );
      return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'Not  Delated.',
                'alert-type' => 'danger'
            );
      return Redirect()->back()->with($notification);
        }
   }

}
