<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ems_category;
use App\Models\ems_exam_master;
use App\Models\ems_student;
use App\Models\ems_portal;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class Admin extends Controller
{
   
   public function sweet_alert_success($massage)
   {
     
      alert()->success('Success',$massage )->persistent('Close')->autoclose(3500);
      
      
   }
   public function index()
   {
       return view('admin.dashboard');
   }

   public function exam_category()
   {
      $data=DB::table('ems_categories')->get();
            

       return view('admin.exam_category',["datas"=>$data]);
   }


   
   public function add_category(Request $req)
   {
 
    $validater=Validator::make($req->all(),["name"=>"required"]);


    if($validater)
    {
          $category= new ems_category;
          $category->name=$req->category_name;
          $category->status=$req->status_name;
          $category->save();
     $arr=array("status"=>"false","massage"=>"success","reload"=>url('admin/exam_category'));

    }
    else
    
    {

          $arr=array("status"=>"false","massage"=>$validater->errors()->all());
    }
      echo json_encode($arr);
   }

  


   public function edit_category($id,Request $req)
   {
      
  /*return DB::table('ems_categories')
  ->where('id',$id)
  ->get();*/
  $category= ems_category::where('id',$id)->first();
  $category->name=$req->category_name;
  $category->status=$req->status_name;

  if($category->update())
  {
   $massage='Record Updated';
     $this->sweet_alert_success($massage);
   }
  return redirect()->back();
   }

    public function delete_category($id)
    {
     
      $category= ems_category::where('id',$id)->first();
     if($category->delete())
      {
       $massage='Record deleted';
         $this->sweet_alert_success($massage);
         return redirect()->back();
       }
      
     

    }


    public function  manage_exam()
    {
      $data=DB::table('ems_exam_masters')
      ->join('ems_categories','ems_exam_masters.category','ems_categories.id')
      ->select(['ems_exam_masters.*','ems_categories.name as cat_name','ems_categories.status as cat_status','ems_categories.id as cat_id'])
     
      ->orderBy('id', 'desc')
      ->get();  
     $cd_datas=DB::table('ems_categories')
       // ->select('id','status')
        ->orderBy('id', 'desc')
        ->where('status','1')
        ->get();  

      return view('admin.manage_exam',["datas"=>$data,"cd_datas"=>$cd_datas]);
    }



   




    public function  add_manage_exam(Request $req)
    {

      $req->input();
     $exam=new ems_exam_master;
      $exam->tittle=$req->tittle;
      $exam->exam_date=$req->Exam_date_name;
      $exam->category=$req->category;
      $exam->status=1;

  if($exam->save())
  {

    $massage='Exam Record added';
    $this->sweet_alert_success($massage);
      return redirect()->back();

  }


    }
   

    public function  edit_exam($id,Request $req)
    {
       
   /*return DB::table('ems_categories')
   ->where('id',$id)
   ->get();*/
   $exam=ems_exam_master::where('id',$id)->first();
   $exam->tittle=$req->tittle;
   $exam->category=$req->category;
   $exam->exam_date=$req->date_name;
   
   $exam->status=$req->status;
 
   if($exam->update())
   {
    $massage='Record Updated';
      $this->sweet_alert_success($massage);
    }
   return redirect()->back();
    }




    public function delete_exam($id)
    {
     
      $exam= ems_exam_master::where('id',$id)->first();
     if($exam->delete())
      {
       $massage='Record deleted';
         $this->sweet_alert_success($massage);
       }
       return redirect()->back();
     

    }




    public function manage_student()
    { 
       $manage_exam_data=ems_exam_master::where('status','1')->get(); 
       $data=DB::table('ems_students')->get();
      return view('admin.manage_student' ,["datas"=>$data,"manage_exam_datas"=>$manage_exam_data]);
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


  public function delete_student($id)
  {
    $student=ems_student::where('id',$id)->first();
    if($student->delete())
    {
     $massage='Record deleted';
       $this->sweet_alert_success($massage);
       return redirect()->back();
     }
    
  }



  public function manage_portal()
  {
    
    $data=DB::table('ems_portals')->get();
   return view('admin.manage_portal' ,["datas"=>$data]);

  }

  public function add_manage_portal(request $req)
  {


    $req->input();
    $portal=new ems_portal;
     $portal->name=$req->name;
     $portal->email=$req->email;
     $portal->mobile=$req->mobile;
     $portal->password=$req->password;
     $portal->status=1;

 if($portal->save())
 {

   $massage='Portal Records added';
   $this->sweet_alert_success($massage);
     return redirect()->back();

 }
    
  }



  public function edit_manage_portal($id,Request $req)
  {
    $portal=ems_portal::where('id',$id)->first();
    $portal->name=$req->name;
    $portal->email=$req->email;
    $portal->mobile=$req->mobile;
    
    $portal->password=$req->password;
    $portal->status=$req->status;

    if($portal->save())
 {

   $massage='portal Records updated';
   $this->sweet_alert_success($massage);
     return redirect()->back();

 }

  }

  

  public function delete_portal($id)
  {
    $portal=ems_portal::where('id',$id)->first();
    if($portal->delete())
    {
     $massage='Record deleted';
       $this->sweet_alert_success($massage);
       return redirect()->back();
     }
    
  }
}
