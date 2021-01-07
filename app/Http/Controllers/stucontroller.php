<?php

namespace App\Http\Controllers;
use App\Models\ems_student;
use Illuminate\Http\Request;

class stucontroller extends Controller
{
  
    public function sweet_alert($massage,$type)
    {

      
       alert()->$type($type,$massage )->persistent('Close')->autoclose(3500);
       
       
    }
    public function student_signup()
    {
        return view('student.signup');
    }
 
   public function signup_create(Request $req)
   {
   $check=ems_student::where('email',$req->email)->get()->toarray();


 if($check)
 {
    $massage='Email already Exist';
    $type="warning";
    $this->sweet_alert($massage,$type);
      return redirect()->back();
 }
 else
 {
    $student=new ems_student;
     $student->name=$req->name;
     $student->email=$req->email;
     $student->mobile=$req->mobile;
     $student->password=$req->password;
     $student->status=1;


 if($student->save())
 {

   $massage='student Records added';
   $type="success";
   $this->sweet_alert($massage,$type);
     return redirect()->back();

 }}
    }


    public function student_login(Request $req)
    {

      if($req->session()->has('suser'))
      {
         return redirect('/student/student_dashboard');
      }
      
        return view('student.login');
    }

    public function login_access(Request $req)
    {



        $check=ems_student::where('email',$req->email)->where('password',$req->password)->first();
       

       
        if($check)
        {
            if($check['status']==1)
       {
          
     $req->session()->put('suser',$check);

   
            $massage='login Success';
            $type="success";
            $this->sweet_alert($massage,$type);

              return redirect('student/student_dashboard');
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
