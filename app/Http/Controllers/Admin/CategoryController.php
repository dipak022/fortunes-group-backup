<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
class CategoryController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }
    public function category(){
    	$categorys=DB::table('cetegory')->get();
    	return view('backend-page.category.category', compact('categorys'));
    } 

    public function Storecategory(Request $request){
    	//return view('backend-page.category.category');
    	 $validatedData = $request->validate([
            'category_name' => 'required|unique:cetegory|max:10',
            'link' => 'required|unique:cetegory|max:20',
        ]);
        $data=array();
        $data['category_name']=$request->category_name;
        $data['link']=$request->link;
        $done=DB::table('cetegory')->insert($data);
        if($done){
        	$notification = array(
                'message' => 'Category Added Successfully.',
                'alert-type' => 'success'
            );
    	return redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'Category Not  Added',
                'alert-type' => 'danger'
            );
    	return redirect()->back()->with($notification);
        }

    	
    }

    public function Editcategory($id){
    	$cat=DB::table('cetegory')->where('id',$id)->first();
    	return view('backend-page.category.Editcategory',compact('cat'));
      
    }

    public function Updatecategory(Request $request,$id){
         
        $data=array();
        $data['category_name']=$request->category_name;
        $data['link']=$request->link;
        $done=DB::table('cetegory')->where('id',$id)->update($data);
         if($done){
        	$notification = array(
                'message' => 'Category Update Successfully.',
                'alert-type' => 'success'
            );
    	return redirect()->route('Category')->with($notification);
        }else{
          $notification = array(
                'message' => 'Category Not  Updated.',
                'alert-type' => 'danger'
            );
    	return redirect()->route('Category')->with($notification);
        }
    }

    
     public function Deletecategory($id){
        $done=DB::table('cetegory')->where('id',$id)->delete();
        
        if($done){
        	$notification = array(
                'message' => 'Category Delated Successfully.',
                'alert-type' => 'success'
            );
    	return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'Category Not  Delated.',
                'alert-type' => 'danger'
            );
    	return Redirect()->back()->with($notification);
        }
    }

    //sub category

    public function Subcategory(){
          $category=DB::table('cetegory')->get();
    	  $subcategorys=DB::table('subcategory')
            ->join('cetegory','subcategory.category_id','cetegory.id')
            ->select('subcategory.*','cetegory.category_name')
            ->get();
    	return view('backend-page.subcategory.subcategory',compact('subcategorys','category'));

    }

    public function StoreSubcategory(Request $request){

        $validatedData = $request->validate([
            'subcategory_name' => 'required|unique:subcategory|max:50',
            'link' => 'required:subcategory|max:20',
        ]);
       
        $data=array();
        $data['category_id']=$request->category_id;
        $data['subcategory_name']=$request->subcategory_name;
        $data['link']=$request->link;
        $image=$request->image;

           if($image){
                $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(300,300)->save('public/public/media/subcategoryicon/'.$image_one_name);
                $data['image']='public/public/media/subcategoryicon/'.$image_one_name;
                
                $done=DB::table('subcategory')->insert($data);

                if($done){
                    $notification = array(
                        'message' => 'SubCategory Added Successfully.',
                        'alert-type' => 'success'
                    );
                return redirect()->back()->with($notification);
                }else{
                  $notification = array(
                        'message' => 'SubCategory Not Added Successfully.',
                        'alert-type' => 'danger'
                    );
                return redirect()->back()->with($notification);
                }   
           }

        /*$done=DB::table('subcategory')->insert($data);
        if($done){
        	$notification = array(
                'message' => 'SubCategory Added Successfully.',
                'alert-type' => 'success'
            );
    	return redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'SubCategory Not  Added',
                'alert-type' => 'danger'
            );
    	return redirect()->back()->with($notification);
        }*/
    }

    public function EditSubcategory($id){
      
     $subcat=DB::table('subcategory')->where('id',$id)->first();
     $category=DB::table('cetegory')->get();
     return view('backend-page.subcategory.Editsubcategory',compact('subcat','category'));
    }

    public function UpdateSubcategory(Request $request,$id){
     
        $data=array();
        $data['category_id']=$request->category_id;
        $data['subcategory_name']=$request->subcetagory_name;
        $old_image=$request->old_image;
        $image=$request->image;
        if($image){
                unlink($old_image);
                $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(300,300)->save('public/public/media/subcategoryicon/'.$image_one_name);
                $data['image']='public/public/media/subcategoryicon/'.$image_one_name;
                
                $done=DB::table('subcategory')->where('id',$id)->update($data);

                if($done){
                    $notification = array(
                        'message' => 'Sub Category Updated Successfully.',
                        'alert-type' => 'success'
                    );
                return redirect()->back()->with($notification);
                }else{
                  $notification = array(
                        'message' => 'Sub Category Not Updated Successfully.',
                        'alert-type' => 'danger'
                    );
                return redirect()->back()->with($notification);
                }   
           }else{
                $done=DB::table('subcategory')->where('id',$id)->update($data);
                if($done){
                $notification = array(
                    'message' => 'SubCategory Update Successfully.',
                    'alert-type' => 'success'
                );
                return redirect()->route('service')->with($notification);
                }else{
                  $notification = array(
                        'message' => 'Sub Category Not  Updated.',
                        'alert-type' => 'danger'
                    );
                return redirect()->route('SubCategory')->with($notification);
               }
            }
        
       /*  if($done){
        	$notification = array(
                'message' => 'SubCategory Update Successfully.',
                'alert-type' => 'success'
            );
    	return redirect()->route('SubCategory')->with($notification);
        }else{
          $notification = array(
                'message' => 'SubCategory Not  Updated.',
                'alert-type' => 'danger'
            );
    	return redirect()->route('SubCategory')->with($notification);
        }*/
    }
    public function DeleteSubcategory($id){
        $images=DB::table('subcategory')->where('id',$id)->first();
        $image=$images->image;
        unlink($image);
        $done=DB::table('subcategory')->where('id',$id)->delete();
        
        if($done){
        	$notification = array(
                'message' => 'SubCategory Delated Successfully.',
                'alert-type' => 'success'
            );
    	return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'SubCategory Not  Delated.',
                'alert-type' => 'danger'
            );
    	return Redirect()->back()->with($notification);
        }
    }




}

  
    
