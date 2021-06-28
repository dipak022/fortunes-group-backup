<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;
class ProjectCategoryController extends Controller
{
    public function create(){
        
    	/*$pro_cet=DB::table('project_category')->get();
        $pro_cat=DB::table('pro_cat')->get();*/
    	


        $pro_cat=DB::table('pro_cat')->get();
        
          $pro_cet=DB::table('project_category')
            ->join('pro_cat','project_category.procat_id','pro_cat.id')
            ->select('project_category.*','pro_cat.cat_name')
            ->get();
            return view('backend-page.ProjectCategory.create', compact('pro_cet','pro_cat'));
        
    }

    public function storeprojectcategory(Request $request){
      $data=array();
        $data['pro_category_name']=$request->pro_category_name;
        $data['procat_id']=$request->procat_id;
        
        $done=DB::table('project_category')->insert($data);
        if($done){
        	$notification = array(
                'message' => 'Project Subcategory Added Successfully.',
                'alert-type' => 'success'
            );
    	return redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'Project Subcategory Not  Added',
                'alert-type' => 'danger'
            );
    	return redirect()->back()->with($notification);
        }
    }

    public function editprojectcategory($id){
     
     $editprojectcategory=DB::table('project_category')->where('id',$id)->first();
     $category=DB::table('pro_cat')->get();
       return view('backend-page.ProjectCategory.editprojectcategory',compact('editprojectcategory','category'));
    }

    public function updateprojectcategory(Request $request,$id){
      $data=array();
        $data['pro_category_name']=$request->pro_category_name;
        $data['procat_id']=$request->procat_id;
        $done=DB::table('project_category')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                'message' => 'Project Subcategory Update Successfully.',
                'alert-type' => 'success'
            );
        return redirect()->route('projects')->with($notification);
        }else{
          $notification = array(
                'message' => 'Project Subcategory Not  update',
                'alert-type' => 'danger'
            );
        return redirect()->back()->with($notification);
        }
    }
    public function deleteprojectcategory($id){
      $done=DB::table('project_category')->where('id',$id)->delete();
        if($done){
            $notification = array(
                'message' => 'Project Subcategory Delete Successfully.',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'Project Subcategory Not  Delete',
                'alert-type' => 'danger'
            );
        return redirect()->back()->with($notification);
        }
    }

    // category create 
    public function createCategory(){
        $fortuneCategory=DB::table('fortuneCategory')->get();
        //$pro_cet=DB::table('pro_cat')->get();
         /* $pro_cet=DB::table('fortuneCategory')
            ->join('pro_cat','fortuneCategory.id','pro_cat.companies_id')
            ->select('fortuneCategory.*','pro_cat.cat_name')
            ->get();*/

           $pro_cet=DB::table('pro_cat')
            ->join('fortuneCategory','pro_cat.companies_id','fortuneCategory.id')
            ->select('pro_cat.*','fortuneCategory.name')
            ->get();
           
        return view('backend-page.pro_cat.create', compact('pro_cet','fortuneCategory'));
    }

    
    public function storeprocategory(Request $request){
      $data=array();
        $data['cat_name']=$request->cat_name;
        $data['companies_id']=$request->companies_id;
        $data['priority']=$request->priority;
        $done=DB::table('pro_cat')->insert($data);
        if($done){
            $notification = array(
                'message' => 'Project Category Added Successfully.',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'Project Category Not  Added',
                'alert-type' => 'danger'
            );
        return redirect()->back()->with($notification);
        }
    }

    public function editprocategory($id){
     
     $editprocategory=DB::table('pro_cat')->where('id',$id)->first();
     $category=DB::table('fortuneCategory')->get();
       return view('backend-page.pro_cat.editprojectcat',compact('editprocategory','category'));
    }

    public function updateprocategory(Request $request,$id){
      $data=array();
        $data['cat_name']=$request->cat_name;
        $data['companies_id']=$request->companies_id;
        $data['priority']=$request->priority;
        $done=DB::table('pro_cat')->where('id',$id)->update($data);
        if($done){
            $notification = array(
                'message' => 'Project Category Update Successfully.',
                'alert-type' => 'success'
            );
        return redirect()->route('pro_cat')->with($notification);
        }else{
          $notification = array(
                'message' => 'Project Category Not  update',
                'alert-type' => 'danger'
            );
        return redirect()->back()->with($notification);
        }
    }
     public function deleteprocategory($id){
      $done=DB::table('pro_cat')->where('id',$id)->delete();
        if($done){
            $notification = array(
                'message' => 'Project Category Delete Successfully.',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'Project Category Not  Delete',
                'alert-type' => 'danger'
            );
        return redirect()->back()->with($notification);
        }
    }
}
