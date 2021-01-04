<?php
namespace App\Http\Controllers;
use App\Models\ems_portal;

use Illuminate\Http\Request;

class PortalController extends Controller
{


    public function portal()
    {
        return view('portal.portal');
    }

    public function sweet_alert($massage,$type)
    {

      
       alert()->$type($type,$massage )->persistent('Close')->autoclose(3500);
       
       
    }
    public function portal_signup()
    {
        return view('portal.signup');
    }
 
   public function signup_create( Request $req)
   {
   $cheak=ems_portal::
   where('email',$req->email)->get();

 if($cheak)
 {
    $massage='Email already Exist';
    $type="warning";
    $this->sweet_alert($massage,$type);
      return redirect()->back();
 }
 else
 {
    $portal=new ems_portal;
     $portal->name=$req->name;
     $portal->email=$req->email;
    return $portal->mobile=$req->mobile;
     $portal->password=$req->password;
     $portal->status=1;


 if($portal->save())
 {

   $massage='Portal Records added';
   $type="success";
   $this->sweet_alert($massage,$type);
     return redirect()->back();

 }}
    }


    public function portal_login()
    {
        return view('portal.login');
    }

}



