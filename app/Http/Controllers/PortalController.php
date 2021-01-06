<?php
namespace App\Http\Controllers;
use App\Models\ems_portal;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PortalController extends Controller
{


 

    public function sweet_alert($massage,$type)
    {

      
       alert()->$type($type,$massage )->persistent('Close')->autoclose(3500);
       
       
    }
    public function portal_signup()
    {
        return view('portal.signup');
    }
 
   public function signup_create(Request $req)
   {
   $check=ems_portal::where('email',$req->email)->get()->toarray();


 if($check)
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
     $portal->mobile=$req->mobile;
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


    public function portal_login(Request $req)
    {

      if($req->session()->has('puser'))
      {
         return redirect('/portal/portal_dashboard');
      }
      
        return view('portal.login');
    }

    public function login_access(Request $req)
    {



        $check=ems_portal::where('email',$req->email)->where('password',$req->password)->first();
       

       
        if($check)
        {
            if($check['status']==1)
       {
          
     $req->session()->put('puser',$check);

   
            $massage='login Success';
            $type="success";
            $this->sweet_alert($massage,$type);

              return view('portal/portal');
        }

        
    else{

        $massage='Your Account is Blocked';
        $type="warning";
        $this->sweet_alert($massage,$type);
          return redirect()->back();

    }
    }
        else
        {
            $massage='Email Or Password Incorrect';
            $type="warning";
            $this->sweet_alert($massage,$type);
              return redirect()->back();
        }
    
}
}



