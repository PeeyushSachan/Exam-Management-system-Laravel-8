<?php
use Illuminate\Support\Facades\Session;
namespace App\Http\Controllers;
use App\Models\ems_exam_master;
use App\Models\ems_student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnSelf;

class portaloperation extends Controller
{

    public function sweet_alert_success($massage)
    {
      
       alert()->success('Success',$massage )->persistent('Close')->autoclose(3500);
       
       
    }

    public function portal_dashboard(Request $req)
    {
        if(!$req->session()->has('puser'))
        {
        return redirect('/portal/login');
        }
        else
        {

            $master_data=DB::table('ems_exam_masters')
            ->join('ems_categories','ems_exam_masters.category','ems_categories.id')
            ->select(['ems_exam_masters.*','ems_categories.name as cat_name','ems_categories.status as cat_status','ems_categories.id as cat_id'])

            ->orderBy('id', 'desc')
            ->get();  
         
            return view('portal/portal',["master_datas"=>$master_data]);
        }
       
     
     
    }
    public function  exam_form($id)
    {
   
      /* return $exam_master=ems_exam_master::where('id',$id)->get()->first();
       return view('portal.exam_form',["exam_master"=>$exam_master]);*/

    }


















    

    public function manage_student()
    { 
       $manage_exam_data=ems_exam_master::where('status','1')->get(); 
       $data=DB::table('ems_students')->get();
      return view('portal.manage_student' ,["datas"=>$data,"manage_exam_datas"=>$manage_exam_data]);
    }


  public function add_manage_student(request $req)
  {


    $req->input();
    $student=new ems_student;
     $student->name=$req->name;
     $student->email=$req->email;
     $student->mobile=$req->mobile;
     $student->dob=$req->dob;
     $student->exam=$req->exam;
     $student->password=$req->password;
     $student->status=1;

 if($student->save())
 {

   $massage='Student Records added';
   $this->sweet_alert_success($massage);
     return redirect()->back();

 }
    
  }


  public function edit_manage_student($id,Request $req)
  {
    $student=ems_student::where('id',$id)->first();
    $student->name=$req->name;
    $student->email=$req->email;
    $student->mobile=$req->mobile;
    $student->dob=$req->dob;
    $student->exam=$req->exam;
    $student->password=$req->password;
    $student->status=$req->status;

    if($student->save())
 {

   $massage='Student Records updated';
   $this->sweet_alert_success($massage);
     return redirect()->back();

 }

  }
}
