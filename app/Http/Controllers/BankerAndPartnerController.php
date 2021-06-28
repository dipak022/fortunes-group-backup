<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;
use File;
class BankerAndPartnerController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function banker(){
        $banker=DB::table('bankers')->get();
    	return view('backend-page.banker.banker',compact('banker'));
    }
    
    public function storebanker(Request $request){
         $data=array();
       

        $image=$request->image;

          if($image){
                $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(1200,1000)->save('public/public/media/banker/'.$image_one_name);
                $data['image']='public/public/media/banker/'.$image_one_name;
                
                $done=DB::table('bankers')->insert($data);

		        if($done){
		        	$notification = array(
		                'message' => 'banker Added Successfully.',
		                'alert-type' => 'success'
		            );
		    	return redirect()->back()->with($notification);
		        }else{
		          $notification = array(
		                'message' => 'banker Not  Added',
		                'alert-type' => 'danger'
		            );
		    	return redirect()->back()->with($notification);
		        }
                    
                   
        }else{
            $notification = array(
                        'message' => 'banker image must be added',
                        'alert-type' => 'warning'
                    );
                return redirect()->back()->with($notification);
        }
        
    }
    public function deletebanker($id){
        $images=DB::table('bankers')->where('id',$id)->first();
        $image=$images->image;
        unlink($image);
    	  $done=DB::table('bankers')->where('id',$id)->delete();
        
        if($done){
        	$notification = array(
                'message' => 'bankers Delated Successfully.',
                'alert-type' => 'success'
            );
    	return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'bankers Not  Delated.',
                'alert-type' => 'danger'
            );
    	return Redirect()->back()->with($notification);
        }
        
    }
     public function editbanker($id){
        $bankers=DB::table('bankers')->where('id',$id)->first();
        return view('backend-page.banker.editbanker',compact('bankers'));

    }

    public function updatebanker(Request $request,$id){

        $image=$request->image;
        $old_image=$request->old_image;
        if($image){
            unlink($old_image);
            $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200,1000)->save('public/public/media/banker/'.$image_one_name);
            $data['image']='public/public/media/banker/'.$image_one_name;
 
            $done=DB::table('bankers')->where('id',$id)->update($data);

            if($done){
                $notification = array(
                    'message' => 'banker Update Successfully.',
                    'alert-type' => 'success'
                );
            return redirect()->route("banker")->with($notification);
            }else{
              $notification = array(
                    'message' => 'banker Not  Update',
                    'alert-type' => 'danger'
                );
            return redirect()->back()->with($notification);
            }
                
               
    }
    else{
         $notification = array(
                    'message' => 'please no change !! please image Change',
                    'alert-type' => 'danger'
                );
            return redirect()->back()->with($notification);
    }
    }
    
    //patner
    public function partner(){
        $partner=DB::table('partners')->get();
    	return view('backend-page.partner.partner',compact('partner'));
    }
    public function storepartner(Request $request){
         $data=array();
       

        $image=$request->image;

          if($image){
                $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(1200,1000)->save('public/public/media/banker/'.$image_one_name);
                $data['image']='public/public/media/banker/'.$image_one_name;
                
                $done=DB::table('partners')->insert($data);

		        if($done){
		        	$notification = array(
		                'message' => 'partner Added Successfully.',
		                'alert-type' => 'success'
		            );
		    	return redirect()->back()->with($notification);
		        }else{
		          $notification = array(
		                'message' => 'partner Not  Added',
		                'alert-type' => 'danger'
		            );
		    	return redirect()->back()->with($notification);
		        }
                    
                   
        }else{
             $notification = array(
                        'message' => 'partner image must be added',
                        'alert-type' => 'danger'
                    );
                return redirect()->back()->with($notification);
        }
        
    }
     public function deletepartner($id){
        $images=DB::table('partners')->where('id',$id)->first();
        $image=$images->image;
        unlink($image);
    	  $done=DB::table('partners')->where('id',$id)->delete();
        
        if($done){
        	$notification = array(
                'message' => 'partner Delated Successfully.',
                'alert-type' => 'success'
            );
    	return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'partner Not  Delated.',
                'alert-type' => 'danger'
            );
    	return Redirect()->back()->with($notification);
        }
    }
     public function editpartner($id){
        $partner=DB::table('partners')->where('id',$id)->first();
        return view('backend-page.partner.editpartner',compact('partner'));

    }

    public function updatepartner(Request $request,$id){
        $image=$request->image;
        $old_image=$request->old_image;

        if($image){
            unlink($old_image);
            $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200,1000)->save('public/public/media/banker/'.$image_one_name);
            $data['image']='public/public/media/banker/'.$image_one_name;
            $done=DB::table('partners')->where('id',$id)->update($data);
            if($done){
                $notification = array(
                    'message' => 'partner update Successfully.',
                    'alert-type' => 'success'
                );
            return redirect()->route("partner")->with($notification);
            }else{
              $notification = array(
                    'message' => 'partner Not  update',
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




    // settelment Controller here

    public function settlement(){
        $settlement=DB::table('settelment')->get();
        return view('backend-page.settlement_bank.settlement',compact('settlement'));
    }

    public function storesettlement(Request $request){
         $data=array();
         $image=$request->image;
          if($image){
                $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(1200,1000)->save('public/public/media/banker/'.$image_one_name);
                $data['image']='public/public/media/banker/'.$image_one_name;
                
                $done=DB::table('settelment')->insert($data);

                if($done){
                    $notification = array(
                        'message' => 'settlement Added Successfully.',
                        'alert-type' => 'success'
                    );
                return redirect()->back()->with($notification);
                }else{
                  $notification = array(
                        'message' => 'settlement Not  Added',
                        'alert-type' => 'danger'
                    );
                return redirect()->back()->with($notification);
                }
                    
                   
        }else{
             $notification = array(
                        'message' => 'settlement image must be added',
                        'alert-type' => 'danger'
                    );
                return redirect()->back()->with($notification);
        }
        
    }
     public function deletesettlement($id){
        $images=DB::table('settelment')->where('id',$id)->first();
        $image=$images->image;
        unlink($image);
          $done=DB::table('settelment')->where('id',$id)->delete();
        
        if($done){
            $notification = array(
                'message' => 'settlement Delated Successfully.',
                'alert-type' => 'success'
            );
        return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'settlement Not  Delated.',
                'alert-type' => 'danger'
            );
        return Redirect()->back()->with($notification);
        }
    }
     public function editsettlement($id){
        $settelment=DB::table('settelment')->where('id',$id)->first();
        return view('backend-page.settlement_bank.editsettlement',compact('settelment'));

    }

    public function updatesettlement(Request $request,$id){
        $image=$request->image;
        $old_image=$request->old_image;

        if($image){
            unlink($old_image);
            $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200,1000)->save('public/public/media/banker/'.$image_one_name);
            $data['image']='public/public/media/banker/'.$image_one_name;
            $done=DB::table('settelment')->where('id',$id)->update($data);
            if($done){
                $notification = array(
                    'message' => 'settlement update Successfully.',
                    'alert-type' => 'success'
                );
            return redirect()->route("settlement")->with($notification);
            }else{
              $notification = array(
                    'message' => 'settlement Not  update',
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


 // insurers contoller here 

  public function insurers(){
        $insurers=DB::table('insurers')->get();
        return view('backend-page.insurers.insurers',compact('insurers'));
    }

    public function storeinsurers(Request $request){
         $data=array();
         $image=$request->image;
          if($image){
                $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(1200,1000)->save('public/public/media/banker/'.$image_one_name);
                $data['image']='public/public/media/banker/'.$image_one_name;
                
                $done=DB::table('insurers')->insert($data);

                if($done){
                    $notification = array(
                        'message' => 'insurers Added Successfully.',
                        'alert-type' => 'success'
                    );
                return redirect()->back()->with($notification);
                }else{
                  $notification = array(
                        'message' => 'insurers Not  Added',
                        'alert-type' => 'danger'
                    );
                return redirect()->back()->with($notification);
                }
                    
                   
        }else{
             $notification = array(
                        'message' => 'insurers image must be added',
                        'alert-type' => 'danger'
                    );
                return redirect()->back()->with($notification);
        }
        
    }
     public function deleteinsurers($id){
        $images=DB::table('insurers')->where('id',$id)->first();
        $image=$images->image;
        unlink($image);
          $done=DB::table('insurers')->where('id',$id)->delete();
        
        if($done){
            $notification = array(
                'message' => 'insurers Delated Successfully.',
                'alert-type' => 'success'
            );
        return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'insurers Not  Delated.',
                'alert-type' => 'danger'
            );
        return Redirect()->back()->with($notification);
        }
    }
     public function editinsurers($id){
        $insurers=DB::table('insurers')->where('id',$id)->first();
        return view('backend-page.insurers.editinsurers',compact('insurers'));

    }

    public function updateinsurers(Request $request,$id){
        $image=$request->image;
        $old_image=$request->old_image;

        if($image){
            unlink($old_image);
            $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200,1000)->save('public/public/media/banker/'.$image_one_name);
            $data['image']='public/public/media/banker/'.$image_one_name;
            $done=DB::table('insurers')->where('id',$id)->update($data);
            if($done){
                $notification = array(
                    'message' => 'insurers update Successfully.',
                    'alert-type' => 'success'
                );
            return redirect()->route("insurers")->with($notification);
            }else{
              $notification = array(
                    'message' => 'insurers Not  update',
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

  //auditors controller here 

  public function auditors(){
        $auditors=DB::table('auditots')->get();
        return view('backend-page.auditors.auditors',compact('auditors'));
    }

    public function storeauditors(Request $request){
         $data=array();
         $image=$request->image;
          if($image){
                $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(1200,1000)->save('public/public/media/banker/'.$image_one_name);
                $data['image']='public/public/media/banker/'.$image_one_name;
                
                $done=DB::table('auditots')->insert($data);

                if($done){
                    $notification = array(
                        'message' => 'auditors Added Successfully.',
                        'alert-type' => 'success'
                    );
                return redirect()->back()->with($notification);
                }else{
                  $notification = array(
                        'message' => 'auditors Not  Added',
                        'alert-type' => 'danger'
                    );
                return redirect()->back()->with($notification);
                }
                    
                   
        }else{
             $notification = array(
                        'message' => 'auditors image must be added',
                        'alert-type' => 'danger'
                    );
                return redirect()->back()->with($notification);
        }
        
    }
     public function deleteauditors($id){
        $images=DB::table('auditots')->where('id',$id)->first();
        $image=$images->image;
        unlink($image);
          $done=DB::table('auditots')->where('id',$id)->delete();
        
        if($done){
            $notification = array(
                'message' => 'auditors Delated Successfully.',
                'alert-type' => 'success'
            );
        return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'auditors Not  Delated.',
                'alert-type' => 'danger'
            );
        return Redirect()->back()->with($notification);
        }
    }
     public function editauditors($id){
        $auditors=DB::table('auditots')->where('id',$id)->first();
        return view('backend-page.auditors.editauditors',compact('auditors'));

    }

    public function updateauditors(Request $request,$id){
        $image=$request->image;
        $old_image=$request->old_image;

        if($image){
            unlink($old_image);
            $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200,1000)->save('public/public/media/banker/'.$image_one_name);
            $data['image']='public/public/media/banker/'.$image_one_name;
            $done=DB::table('auditots')->where('id',$id)->update($data);
            if($done){
                $notification = array(
                    'message' => 'auditors update Successfully.',
                    'alert-type' => 'success'
                );
            return redirect()->route("auditors")->with($notification);
            }else{
              $notification = array(
                    'message' => 'auditors Not  update',
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

  //advisors controller here 

    public function advisors(){
        $advisors=DB::table('advisors')->get();
        return view('backend-page.legal_advisors.advisors',compact('advisors'));
    }

    public function storeadvisors(Request $request){
         $data=array();
         $image=$request->image;
          if($image){
                $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(1200,1000)->save('public/public/media/banker/'.$image_one_name);
                $data['image']='public/public/media/banker/'.$image_one_name;
                
                $done=DB::table('advisors')->insert($data);

                if($done){
                    $notification = array(
                        'message' => 'advisors Added Successfully.',
                        'alert-type' => 'success'
                    );
                return redirect()->back()->with($notification);
                }else{
                  $notification = array(
                        'message' => 'advisors Not  Added',
                        'alert-type' => 'danger'
                    );
                return redirect()->back()->with($notification);
                }
                    
                   
        }else{
             $notification = array(
                        'message' => 'advisors image must be added',
                        'alert-type' => 'danger'
                    );
                return redirect()->back()->with($notification);
        }
        
    }
     public function deleteadvisors($id){
        $images=DB::table('advisors')->where('id',$id)->first();
        $image=$images->image;
        unlink($image);
          $done=DB::table('advisors')->where('id',$id)->delete();
        
        if($done){
            $notification = array(
                'message' => 'advisors Delated Successfully.',
                'alert-type' => 'success'
            );
        return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'advisors Not  Delated.',
                'alert-type' => 'danger'
            );
        return Redirect()->back()->with($notification);
        }
    }
     public function editadvisors($id){
        $advisors=DB::table('advisors')->where('id',$id)->first();
        return view('backend-page.legal_advisors.editadvisors',compact('advisors'));

    }

    public function updateadvisors(Request $request,$id){
        $image=$request->image;
        $old_image=$request->old_image;

        if($image){
            unlink($old_image);
            $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200,1000)->save('public/public/media/banker/'.$image_one_name);
            $data['image']='public/public/media/banker/'.$image_one_name;
            $done=DB::table('advisors')->where('id',$id)->update($data);
            if($done){
                $notification = array(
                    'message' => 'advisors update Successfully.',
                    'alert-type' => 'success'
                );
            return redirect()->route("advisors")->with($notification);
            }else{
              $notification = array(
                    'message' => 'advisors Not  update',
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

  // investment controller here 
  public function investment(){
        $investment=DB::table('investment')->get();
        return view('backend-page.investment_bankers.investment',compact('investment'));
    }

    public function storeinvestment(Request $request){
         $data=array();
         $image=$request->image;
          if($image){
                $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(1200,1000)->save('public/public/media/banker/'.$image_one_name);
                $data['image']='public/public/media/banker/'.$image_one_name;
                
                $done=DB::table('investment')->insert($data);

                if($done){
                    $notification = array(
                        'message' => 'investment Added Successfully.',
                        'alert-type' => 'success'
                    );
                return redirect()->back()->with($notification);
                }else{
                  $notification = array(
                        'message' => 'investment Not  Added',
                        'alert-type' => 'danger'
                    );
                return redirect()->back()->with($notification);
                }
                    
                   
        }else{
             $notification = array(
                        'message' => 'investment image must be added',
                        'alert-type' => 'danger'
                    );
                return redirect()->back()->with($notification);
        }
        
    }
     public function deleteinvestment($id){
        $images=DB::table('investment')->where('id',$id)->first();
        $image=$images->image;
        unlink($image);
          $done=DB::table('investment')->where('id',$id)->delete();
        
        if($done){
            $notification = array(
                'message' => 'investment Delated Successfully.',
                'alert-type' => 'success'
            );
        return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'investment Not  Delated.',
                'alert-type' => 'danger'
            );
        return Redirect()->back()->with($notification);
        }
    }
     public function editinvestment($id){
        $investment=DB::table('investment')->where('id',$id)->first();
        return view('backend-page.investment_bankers.editinvestment',compact('investment'));

    }

    public function updateinvestment(Request $request,$id){
        $image=$request->image;
        $old_image=$request->old_image;

        if($image){
            unlink($old_image);
            $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200,1000)->save('public/public/media/banker/'.$image_one_name);
            $data['image']='public/public/media/banker/'.$image_one_name;
            $done=DB::table('investment')->where('id',$id)->update($data);
            if($done){
                $notification = array(
                    'message' => 'investment update Successfully.',
                    'alert-type' => 'success'
                );
            return redirect()->route("investment")->with($notification);
            }else{
              $notification = array(
                    'message' => 'investment Not  update',
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

  //crs controller here 

    public function crs(){
        $crs=DB::table('csr')->get();
        return view('backend-page.crs.crs',compact('crs'));
    }

    public function storecrs(Request $request){
         $data=array();
         $image=$request->image;
          if($image){
                $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(1200,1000)->save('public/public/media/banker/'.$image_one_name);
                $data['image']='public/public/media/banker/'.$image_one_name;
                
                $done=DB::table('csr')->insert($data);

                if($done){
                    $notification = array(
                        'message' => 'csr Added Successfully.',
                        'alert-type' => 'success'
                    );
                return redirect()->back()->with($notification);
                }else{
                  $notification = array(
                        'message' => 'csr Not  Added',
                        'alert-type' => 'danger'
                    );
                return redirect()->back()->with($notification);
                }
                    
                   
        }else{
             $notification = array(
                        'message' => 'csr image must be added',
                        'alert-type' => 'danger'
                    );
                return redirect()->back()->with($notification);
        }
        
    }
     public function deletecrs($id){
        $images=DB::table('csr')->where('id',$id)->first();
        $image=$images->image;
        unlink($image);
          $done=DB::table('csr')->where('id',$id)->delete();
        
        if($done){
            $notification = array(
                'message' => 'csr Delated Successfully.',
                'alert-type' => 'success'
            );
        return Redirect()->back()->with($notification);
        }else{
          $notification = array(
                'message' => 'csr Not  Delated.',
                'alert-type' => 'danger'
            );
        return Redirect()->back()->with($notification);
        }
    }
     public function editcrs($id){
        $crs=DB::table('csr')->where('id',$id)->first();
        return view('backend-page.crs.editcrs',compact('crs'));

    }

    public function updatecrs(Request $request,$id){
        $image=$request->image;
        $old_image=$request->old_image;

        if($image){
            unlink($old_image);
            $image_one_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200,1000)->save('public/public/media/banker/'.$image_one_name);
            $data['image']='public/public/media/banker/'.$image_one_name;
            $done=DB::table('csr')->where('id',$id)->update($data);
            if($done){
                $notification = array(
                    'message' => 'csr update Successfully.',
                    'alert-type' => 'success'
                );
            return redirect()->route("crs")->with($notification);
            }else{
              $notification = array(
                    'message' => 'csr Not  update',
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
