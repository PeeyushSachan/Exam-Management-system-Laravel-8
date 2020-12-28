<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ems_category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class Admin extends Controller
{
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
          $category->status=1;
          $category->save();
     $arr=array("status"=>"false","massage"=>"success","reload"=>url('admin/exam_category'));

    }
    else
    
    {

          $arr=array("status"=>"false","massage"=>$validater->errors()->all());
    }
      echo json_encode($arr);
   }

  
}
