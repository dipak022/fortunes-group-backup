<?php

namespace App\Http\Controllers\Admin\ImageGallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use DB;
use Image;
use File;
class ImageGalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Gallery(){
    	return view('backend-page.Gallery.Gallery');
    }

    public function StoreImage(Request $request){
    	 $data=array();
        
        /*$data['show_all']=$request->show_all;
        $data['gas']=$request->gas;
        $data['oil']=$request->oil;
        $data['industry']=$request->industry;
        $data['eno']=$request->eno;
        $data['factory']=$request->factory;*/

        $image=$request->gallery_image;

          if($image){
                /*$image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(300,300)->save('public/public/media/Gallery/'.$image_one_name);*/
                $image_slidders = Cloudinary::upload($request->file('gallery_image')->getRealPath(),[
                  'folder'=>'group/gallery/'
                ])->getSecurePath();
                
                foreach ($request->user_id as $row) {
            $data[]=[
              "user_id"=>$row,
              "user_value"=>$request->user_value[$row],
              //"gallery_image"=>'public/public/media/Gallery/'.$image_one_name,
              "gallery_image"=>$image_slidders,
              "description"=>$request->description,
            ];
        }

            
                $done=DB::table('project_image')->insert($data);

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
                    
                   
        }
    }
    public function ShowImage(){
    	//$gallery=DB::table('ImageGallery')->get();
    //	return view('backend-page.Gallery.showAllgallery',compact('gallery'));
    	 /*$gallery=DB::table('project_category')
            ->join('project_image','project_category.id','project_image.user_id')
            ->select('project_category.*','project_image.user_id','project_image.user_value','project_image.gallery_image')->get();*/

            $gallery=DB::table('project_image')
            ->join('project_category','project_image.user_id','project_category.id')
            ->select('project_image.*','project_category.pro_category_name')->get();
    	return view('backend-page.Gallery.showAllgallery',compact('gallery'));
    }

    public function EditGallerys($id){
        $gallery=DB::table('project_image')->where('id',$id)->first();
        $project_category=DB::table('project_category')->get();
       /* $gallery=DB::table('project_image')->where('id',$id)
            ->join('project_category','project_image.user_id','project_category.id')
            ->select('project_image.user_value','project_image.gallery_image','project_category.pro_category_name')
            ->first();*/
       
       return view('backend-page.Gallery.EditGallery',compact('gallery','project_category')); 
       
    }

    public function UpdateGallery(Request $request,$id){

    	$data=array();
        
        $data['user_value']=$request->user_value;
        $data['description']=$request->description;
         
        $old_image=$request->old_image;
        
        $image=$request->gallery_image;
        
    	 if($image) {
           /*unlink($old_image);
           $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(200,100)->save('public/public/media/Gallery/'.$image_one_name);*/
           $image_slidders = Cloudinary::upload($request->file('gallery_image')->getRealPath(),[
                  'folder'=>'group/gallery/'
                ])->getSecurePath();
           $data['gallery_image']=$image_slidders;
            $done=DB::table('project_image')->where('id',$id)->update($data);
            if($done){
		        	$notification = array(
		                'message' => 'Image Gallery update Successfully.',
		                'alert-type' => 'success'
		            );
		    	return redirect()->route('show.image')->with($notification);
		        }else{
		          $notification = array(
		                'message' => 'Image Gallery Not update  Added',
		                'alert-type' => 'danger'
		            );
		    	return Redirect()->route('show.image')->with($notification);
		        }

        }else{
            $done=DB::table('project_image')->where('id',$id)->update($data);
            if($done){
                    $notification = array(
                        'message' => 'Image Gallery update Successfully.',
                        'alert-type' => 'success'
                    );
                return redirect()->route('show.image')->with($notification);
                }else{
                  $notification = array(
                        'message' => 'Image Gallery Not update  Added',
                        'alert-type' => 'danger'
                    );
                return Redirect()->route('show.image')->with($notification);
                }
        }

    }

    public function DeleteGallery($id){
       $done=DB::table('project_image')->where('id',$id)->delete();
        
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

}
