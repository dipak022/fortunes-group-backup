<?php

namespace App\Http\Controllers\Admin\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use File;
class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(){
      return view('backend-page.News.News');
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'title'          => 'required|unique:News|max:2000',
            'description'         => 'required|unique:News|max:5500',
            'Responsibilities'       => 'required|unique:News|max:3000',
            'skills'    => 'required|unique:News|max:1000',
            //'logo' => 'required|Setting|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    	$data=array();
        $data['title']=$request->title;
        $data['description']=$request->description;
        $data['Responsibilities']=$request->Responsibilities;
        $data['skills']=$request->skills;
        $image=$request->image;
     /*    if($image){
            $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,150)->save('public/public/media/Grid/'.$image_one_name);
            $data['image']='public/public/media/Grid/'.$image_one_name;


            
            $done=DB::table('News')->insert($data);

            if($done){
                $notification = array(
                    'message' => 'Job Added Successfully.',
                    'alert-type' => 'success'
                );
            return redirect()->back()->with($notification);
            }else{
              $notification = array(
                    'message' => 'Job Not  Added',
                    'alert-type' => 'danger'
                );
            return redirect()->back()->with($notification);
            }         
        }*/
        $done=DB::table('News')->insert($data);
        if($done){
                $notification = array(
                    'message' => 'Job Added Successfully.',
                    'alert-type' => 'success'
                );
            return redirect()->back()->with($notification);
            }else{
              $notification = array(
                    'message' => 'Job Not  Added',
                    'alert-type' => 'danger'
                );
            return redirect()->back()->with($notification);
            }
    }

    public function showallNews(){
        $news=DB::table('News')->get();
        return view('backend-page.News.showAllNews',compact('news'));
   }

   public function EditNews($id){
     $news=DB::table('News')->where('id',$id)->first();
    return view('backend-page.News.editNews',compact('news'));
   }

   public function UpdateNews(Request $request,$id){
        $data=array();
        $data['title']=$request->title;
        $data['description']=$request->description;
        $data['Responsibilities']=$request->Responsibilities;
        $data['skills']=$request->skills;
        $image=$request->image;
        $old_image=$request->old_image;
         if($image){
            unlink($old_image);
            $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,150)->save('public/public/media/Grid/'.$image_one_name);
            $data['image']='public/public/media/Grid/'.$image_one_name;


            $done=DB::table('News')->where('id',$id)->update($data);

            if($done){
                $notification = array(
                    'message' => 'Job update Successfully.',
                    'alert-type' => 'success'
                );
            return redirect()->route('all.news')->with($notification);
            }else{
              $notification = array(
                    'message' => 'Job Not update Added',
                    'alert-type' => 'danger'
                );
            return redirect()->back()->with($notification);
            }         
        }else{
           $done=DB::table('News')->where('id',$id)->update($data);

            if($done){
                $notification = array(
                    'message' => 'Job update Successfully.',
                    'alert-type' => 'success'
                );
            return redirect()->route('all.news')->with($notification);
            }else{
              $notification = array(
                    'message' => 'Job Not update Added',
                    'alert-type' => 'danger'
                );
            return redirect()->back()->with($notification);
            }     
        }
   }
   public function DeleteNews($id){

       /*$news=DB::table('News')->where('id',$id)->first();
        $image=$news->image;
        unlink($image);*/

          $done=DB::table('News')->where('id',$id)->delete();
        
        if($done){
            $notification = array(
                'message' => 'Job Delated Successfully.',
                'alert-type' => 'success'
            );
        return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'Job Not  Delated.',
                'alert-type' => 'danger'
            );
        return Redirect()->back()->with($notification);
        }
   }
}
