<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use File;
class FrontendController extends Controller
{
     public function aboutpage(){
        return view('fontend-page.about');
    }
     public function careerpage(){
         $searces=DB::table('News')->limit(10)->get();
        //return view('fontend-page.careers');
        return view('fontend-page.careers',compact('searces'));
    }
    public function contactpage(){
        return view('fontend-page.contact');
    }

  /*   public function service($id){
        $mid_category=DB::table('categoryImages')->join('fortuneCategory','categoryImages.fortune_cat_id','fortuneCategory.id')->where('categoryImages.fortune_cat_id',$id)->select('categoryImages.*','fortuneCategory.name','fortuneCategory.short_description')
        ->orderBy('id','DESC')->first();
        return view('fontend-page.service',compact('mid_category'));
        /*echo "<pre>";
        print_r($mid_category);
        exit();
    }
   public function services($id){
        $mid_category=DB::table('categoryImages')->join('services','categoryImages.fortune_cat_id','services.id')->where('categoryImages.fortune_cat_id',$id)->select('categoryImages.*','services.title','services.description')
    ->orderBy('id','DESC')->first();
        return view('fontend-page.servicepage',compact('mid_category'));
    /*echo "<pre>";
        print_r($mid_category);
        exit();
    } */
    public function service($id=null){
      $ids=\Crypt::decrypt($id);

        $mid_category=DB::table('categoryImages')->join('fortuneCategory','categoryImages.fortune_cat_id','fortuneCategory.id')->where('categoryImages.fortune_cat_id',$ids)->select('categoryImages.*','fortuneCategory.name','fortuneCategory.short_description')
        ->orderBy('id','DESC')->first();
        if($mid_category!=null){
            return view('fontend-page.service',compact('mid_category'));
        }else{
            return view('fontend-page.404');
        }
        //
        /*echo "<pre>";
        print_r($mid_category);
        exit();*/
    }

     public function servicehpmepage($id,$companyname=null){

      $ids=\Crypt::decrypt($companyname);


      $project_categorys1=DB::table('pro_cat')
      ->where('companies_id',$ids)
         ->first();

      $project_categorys2=DB::table('business_product')
      ->where('business_id',$ids)
         ->get();
         
         $business_sliders=DB::table('business_slider')
      ->where('slider_id',$ids)
         ->get();


         $mid_category=DB::table('categoryImages')
         ->join('fortuneCategory','categoryImages.fortune_cat_id','fortuneCategory.id')
         ->where('categoryImages.fortune_cat_id',$ids)->select('categoryImages.*','fortuneCategory.name','short_description')
         ->orderBy('id','DESC')->first();

    if($mid_category!=null){
      if($project_categorys2!=null){
         return view('fontend-page.servicepage',compact('mid_category','project_categorys1','project_categorys2','business_sliders'));
      }else{
         return view('fontend-page.servicepage',compact('mid_category','project_categorys1','project_categorys2','business_sliders'));
      }
            
        }else{
            return view('fontend-page.404');
        }
        $match=DB::table('categoryImages')->where('fortune_cat_id',$ids)->first();
        if($match){
        $mid_category=DB::table('categoryImages')
         ->join('fortuneCategory','categoryImages.fortune_cat_id','fortuneCategory.id')
         ->where('categoryImages.fortune_cat_id',$ids)->select('categoryImages.*','fortuneCategory.name','short_description')
         ->orderBy('id','DESC')->first();
      }else{
        return view('fontend-page.404');
      }

    }
    
    
    
   public function services($id,$name=null){
    $ids=\Crypt::decrypt($name);
    $business_sliders=DB::table('business_slider')
      ->where('slider_id',$ids)
         ->get();

        $mid_category=DB::table('categoryImages')->join('services','categoryImages.fortune_cat_id','services.id')->where('categoryImages.fortune_cat_id',$ids)->select('categoryImages.*','services.title','services.description')
    ->orderBy('id','DESC')->first();
    if($mid_category!=null){
            return view('fontend-page.servicepage',compact('mid_category','name','business_sliders'));
        }else{
            return view('fontend-page.404');
        }
    //echo $id;
    //echo $name;
        
    /*echo "<pre>";
        print_r($mid_category);
        exit();*/
    }
    
    public function searchvalue(Request $request){
      /* if ($request->search) {
        echo "$request->search";
           $searces=DB::table('News')
             ->where('title','like','%'.$request->search.'%')
             ->orWhere('Responsibilities','like','%'.$request->search.'%')
             ->orWhere('skills','like','%'.$request->search.'%')
             ->get();

             if ($searces) {
                 foreach ($searces as $key => $searce) {
                     echo "$searce";
                 }
             }

       }
*/


    }


    public function action(Request $request)
    {
      $search=$request->get('search');
       $searces=DB::table('News')
             ->where('title','like','%'.$search.'%')
            ->orWhere('Responsibilities','like','%'.$search.'%')
             /* ->orWhere('skills','like','%'.$request->search.'%') */
             ->get();
             //return view('welcome',compact('searces'));
              return view('fontend-page.careers',compact('searces'));
            
    }

    public function autocomplate(Request $request){
      $datas=DB::table('News')->where('title','like','%{ $request->terms }%')->get();
      return response()->json($datas);
    }
    
    public function team(){
        return view('fontend-page.team');
    }
    public function chairman_profile(){
        return view('fontend-page.chairman_profile');
    }
    public function chairmans_profile(){
        return view('fontend-page.chairmans_profile');
    }
    public function chairman_message(){
        return view('fontend-page.about');
    }
    public function managing_director_profile(){
        return view('fontend-page.managing_director_profile');
    }
    public function bankers(){
        return view('fontend-page.bankers');
    }
    public function companyview(){
        return view('fontend-page.companyview');
    }
    public function applyjob(Request $request){
        //return view('fontend-page.bankers');
        $data=array();
       $data['email']=$request->email;
       $data['name']=$request->name;
       $data['phone']=$request->phone;
       

        if($request->file('file')){
            $file=$request->file('file');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file->move('stroge/',$filename);
            $data['file']=$filename;
                /*$image_one_name= hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
                Image::make($file)->resize(160,170)->save('public/public/media/stroge/'.$image_one_name);
                $data['file']='public/public/media/stroge/'.$image_one_name;*/

    
                
                $done=DB::table('jobinfo')->insert($data);

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
    // new page here 

    
    public function achievements(){
        return view('fontend-page.achievement');
    }

    public function tvcs(){
        return view('fontend-page.tvc');
    }
    public function pressads(){
        return view('fontend-page.pressad');
    }
    public function newsevents(){
        return view('fontend-page.newsevents');
    }
    public function latestnews(){
        return view('fontend-page.latestnews');
    }
    public function blogs(){
        return view('fontend-page.blog');
    }
    public function faqs(){
        return view('fontend-page.faq');
    }
    public function csrs(){
        return view('fontend-page.csr');
    }

    public function achievementdetails(){
      return view('fontend-page.achievementdetails');
    }

    public function newsdetails($id){
      $ids=\Crypt::decrypt($id);
      $news_event=DB::table('news_event')->where('id',$ids)->first();
      if($news_event){
       return view('fontend-page.newsdetails',compact('news_event'));
      }else{
        return view('fontend-page.404');
      }
      
    }
    public function blogdetails($id){
      $ids=\Crypt::decrypt($id);
      $blog=DB::table('blog')->where('id',$ids)->first();
      if($blog){
         return view('fontend-page.blogdetails',compact('blog'));
      }else{
        return view('fontend-page.404');
      }
      
    }
    public function latestnewsdetails($id){
      $ids=\Crypt::decrypt($id);
      $latest_news=DB::table('latest_news')->where('id',$ids)->first();
      if($latest_news){
        return view('fontend-page.latestnewsdetails',compact('latest_news'));
      }else{
        return view('fontend-page.404');
      }
      
    }
    
}
