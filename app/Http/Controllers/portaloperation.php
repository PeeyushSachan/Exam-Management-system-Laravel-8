<?php
use Illuminate\Support\Facades\Session;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class portaloperation extends Controller
{

      
     
  


 
    public function portal_dashboard(Request $req)
    {
        if($req->session()->has('user'))
        {
            echo "yes";
        }
        else{
            echo "not";
        }
      

     return   $req->session()->get('user')['id'];
    }
}
