<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ems_category;
use App\Models\ems_exam_master;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class Admin extends Controller
{
   
   public function sweet_alert_success($massage)
   {
     
      alert()->success('Success',$massage )->persistent('Close')->autoclose(3500);
      
      
   }
   public function sweet_alert_warning($massage)
   {

   alert()->warning('Warning Message', $massage)->confirmButton('ok')->cancelButton('cancel');
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
       }
       return redirect()->back();
     

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



}
