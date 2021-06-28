<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Mail\contactusMail;
use Mail;
use Session;
class ContactController extends Controller
{

	/*public function __construct()
    {
        $this->middleware('auth');
    }*/
     public function contactSubmit(Request $request){
        

       $detals=[
        'name' =>$request->name,
        'phone'=>$request->phone, 
      	'msg'  =>$request->msg
       ];

       Mail::to('dipakdebnath5008@gmail.com')->send(new ContactMail($detals));
       
	    return redirect()->back()->with('massage_send','your masage send has been Successfully!');

      
    }
    public function contactusSubmit(Request $request){
        

       $detals=[
        'name' =>$request->name,
        'email' =>$request->email,
        'phone'=>$request->phone,
        'subject'=>$request->subject,
        'message'  =>$request->message
       ];

       Mail::to('dipakdebnath5008@gmail.com')->send(new contactusMail($detals));
       
      return redirect()->back()->with('massage_send','your masage send has been Successfully!');
    }
}
