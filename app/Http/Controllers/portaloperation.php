<?php
use Illuminate\Support\Facades\Session;
namespace App\Http\Controllers;
use App\Models\ems_exam_master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class portaloperation extends Controller
{

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
       return view('portal.exam_form');

    }
}
