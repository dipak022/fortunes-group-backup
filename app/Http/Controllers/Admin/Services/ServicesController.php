<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use File;

class ServicesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
      return view('backend-page.Services.Services');
    }

    public function StoreServices(Request $request){
        $validatedData = $request->validate([
            'title'               => 'required|unique:services|max:200',
            'description'         => 'required|unique:services|max:500',
            'sub_title'           => 'required:services|max:500',
            /*'vedio_or_link'       => 'unique:services|max:500',
            'day'                 => 'unique:services|max:500',
            'hour'                => 'unique:services|max:500',
            'minits'              => 'unique:services|max:500',
            'second'              => 'unique:services|max:500',*/
            //'logo' => 'required|Setting|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $sub_title=$request->sub_title;
        $day=$request->day;
        $vedio_link=$request->vedio_or_link;
        if ($sub_title) {
            if ($day) {
                //echo "sub title acche day ache";
                $data=array();
                $data['title']=$request->title;
                $data['description']=$request->description;
                $data['sub_title']=$request->sub_title;
                $data['vedio_or_link']=$request->vedio_or_link;
                $data['day']=$request->day;
                $data['hour']=$request->hour;
                $data['minits']=$request->minits;
                $data['second']=$request->second;
                $image=$request->image;
               
                if($image){
                        $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(200,150)->save('public/public/media/services/'.$image_one_name);
                        $data['image']='public/public/media/services/'.$image_one_name;

            
                        
                        $done=DB::table('services')->insert($data);

                        if($done){
                            $notification = array(
                                'message' => 'services Added Successfully.',
                                'alert-type' => 'success'
                            );
                        return redirect()->back()->with($notification);
                        }else{
                          $notification = array(
                                'message' => 'services Not  Added',
                                'alert-type' => 'danger'
                            );
                        return redirect()->back()->with($notification);
                        }         
                    }
            }else{
               //echo "sub title acche day nai";
               $data=array();
                $data['title']=$request->title;
                $data['description']=$request->description;
                $data['sub_title']=$request->sub_title;
                $data['vedio_or_link']=$request->vedio_or_link;
                // $data['day']=$request->day;
                // $data['hour']=$request->hour;
                // $data['minits']=$request->minits;
                // $data['second']=$request->second;
                $image=$request->image;
               
                if($image){
                        $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(200,150)->save('public/public/media/services/'.$image_one_name);
                        $data['image']='public/public/media/services/'.$image_one_name;

            
                        
                        $done=DB::table('services')->insert($data);

                        if($done){
                            $notification = array(
                                'message' => 'services Added Successfully.',
                                'alert-type' => 'success'
                            );
                        return redirect()->back()->with($notification);
                        }else{
                          $notification = array(
                                'message' => 'services Not  Added',
                                'alert-type' => 'danger'
                            );
                        return redirect()->back()->with($notification);
                        }         
                    }
            }
        }else{
          if ($day) {
             //echo "sub title nai day ache"; 
             $data=array();
                $data['title']=$request->title;
                $data['description']=$request->description;
                //$data['sub_title']=$request->sub_title;
                $data['vedio_or_link']=$request->vedio_or_link;
                $data['day']=$request->day;
                $data['hour']=$request->hour;
                $data['minits']=$request->minits;
                $data['second']=$request->second;
                $image=$request->image;
               
                if($image){
                        $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(200,150)->save('public/public/media/services/'.$image_one_name);
                        $data['image']='public/public/media/services/'.$image_one_name;

            
                        
                        $done=DB::table('services')->insert($data);

                        if($done){
                            $notification = array(
                                'message' => 'services Added Successfully.',
                                'alert-type' => 'success'
                            );
                        return redirect()->back()->with($notification);
                        }else{
                          $notification = array(
                                'message' => 'services Not  Added',
                                'alert-type' => 'danger'
                            );
                        return redirect()->back()->with($notification);
                        }         
                    }
          }else{
            //echo "sub title nai day nai";
            $data=array();
                $data['title']=$request->title;
                $data['description']=$request->description;
                //$data['sub_title']=$request->sub_title;
                $data['vedio_or_link']=$request->vedio_or_link;
                // $data['day']=$request->day;
                // $data['hour']=$request->hour;
                // $data['minits']=$request->minits;
                // $data['second']=$request->second;
                $image=$request->image;
               
                if($image){
                        $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(200,150)->save('public/public/media/services/'.$image_one_name);
                        $data['image']='public/public/media/services/'.$image_one_name;

            
                        
                        $done=DB::table('services')->insert($data);

                        if($done){
                            $notification = array(
                                'message' => 'services Added Successfully.',
                                'alert-type' => 'success'
                            );
                        return redirect()->back()->with($notification);
                        }else{
                          $notification = array(
                                'message' => 'services Not  Added',
                                'alert-type' => 'danger'
                            );
                        return redirect()->back()->with($notification);
                        }         
                    }
          }
        }

    	
    }

    public function showallServices(){
        $Services=DB::table('services')->get();
        return view('backend-page.Services.showAllServices',compact('Services'));
    }

    public function EditServices($id){
    	$services=DB::table('services')->where('id',$id)->first();
        return view('backend-page.Services.editservices',compact('services'));
    }

    public function UpdateServices(Request $request,$id){
    	$data=array();
        $data['title']=$request->title;
        $data['description']=$request->description;
        /*$data['sub_title']=$request->sub_title;*/
        $data['vedio_or_link']=$request->vedio_or_link;
        $data['day']=$request->day;
        $data['hour']=$request->hour;
        $data['minits']=$request->minits;
        $data['second']=$request->second;
        $image=$request->image;
        if($image){
                $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(200,150)->save('public/public/media/services/'.$image_one_name);
                $data['image']='public/public/media/services/'.$image_one_name;

    
                
                $done=DB::table('services')->where('id',$id)->update($data);

                if($done){
                    $notification = array(
                        'message' => 'services Added Successfully.',
                        'alert-type' => 'success'
                    );
                return redirect()->route('all.services')->with($notification);
                }else{
                  $notification = array(
                        'message' => 'services Not  Added',
                        'alert-type' => 'danger'
                    );
                return redirect()->back()->with($notification);
                }         
            }else{
            	$done=DB::table('services')->where('id',$id)->update($data);

                if($done){
                    $notification = array(
                        'message' => 'services Added Successfully.',
                        'alert-type' => 'success'
                    );
                return redirect()->route('all.services')->with($notification);
                }else{
                  $notification = array(
                        'message' => 'services Not  Added',
                        'alert-type' => 'danger'
                    );
                return redirect()->back()->with($notification);
                }     
            }
    }
    public function DeleteServices($id){
        $services=DB::table('services')->where('id',$id)->first();
        $image=$services->image;
        unlink($image);

          $done=DB::table('services')->where('id',$id)->delete();
        
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
