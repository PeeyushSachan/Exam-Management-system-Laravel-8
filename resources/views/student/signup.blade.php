@extends('layouts.cdn')
@section('body-part')
<div class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
      <a href="#"><b>EMS</b></a>
    </div>
  
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>
  
        <form action="/portal/signup_create" method="post" onsubmit="return submitdataofsingup()">
          @csrf
          
            <div class="input-group mb-3">
            <input  id="singup_user" type="text" class="form-control" placeholder="Full name" name="name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>



          <div class="input-group mb-3">
            <input id="singup_email"   type="email" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input id="singup_mobile" type="text" class="form-control" placeholder="Mobile" name="mobile">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-mobile"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" id="signup_pass" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Retype password" id="signup_cpass" name="cpassword">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input required type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                 I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
      <!--  <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i>
            Sign up using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i>
            Sign up using Google+
          </a>
        </div>-->
  
        <a href="login" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
</div>

<script>


function validateuserofsignup()
      {
     
         var status=true;
      
      var txt=document.getElementById("singup_user");
       

     if(txt.value.length==0)
     {
        
          status=false;
          txt.style.border="1px solid red";
     }   
     else if(!txt.value.match())
     
     { 

      status=false;
          txt.style.border="1px solid red";
     }

     else
     {
     
          txt.style.border="1px solid green";

     }
    
    return status;

      
       
        
      }

      function validateemailofsignup()
      {
     
         var status=true;
      
      var txt=document.getElementById("singup_email");
       

     if(txt.value.length==0)
     {
        
          status=false;
          txt.style.border="1px solid red";
          
     }   
     else if(!txt.value.match())
     
     { 

      status=false;
          txt.style.border="1px solid red";
     }

     else
     {
     
          txt.style.border="1px solid green";

     }
    
    return status;

      }


      function validatemobileofsignup()
      {
     
         var status=true;
      
      var txt=document.getElementById("singup_mobile");
       

     if(txt.value.length==0)
     {
        
          status=false;
          txt.style.border="1px solid red";
          
     }   
     else if(!txt.value.match())
     
     { 

      status=false;
          txt.style.border="1px solid red";
     }

     else
     {
     
          txt.style.border="1px solid green";

     }
    
    return status;

      }

      function validatepassofsignup()
      {
     
         var status=true;
      
      var txt=document.getElementById("signup_pass");
       

     if(txt.value.length==0)
     {
        
          status=false;
          txt.style.border="1px solid red";
          
           
          
     }   
     else if(txt.value.length<8){
         status=false;
          txt.style.border="1px solid red";
           alert("minimum length of pass should be 8");
         
     }
     
     else if(!txt.value.match())
     
     { 

      status=false;
          txt.style.border="1px solid red";
     }

     else
     {
     
          txt.style.border="1px solid green";

     }
    
    return status;

      }
      
       function validatecpassofsignup()
       {
             var status=true;
          var txt1=document.getElementById("signup_pass");
          var txt=document.getElementById("signup_cpass");
          
          if(txt.value.length==0)
     {
        
          status=false;
          txt.style.border="1px solid red";
          
     }
     else if(txt.value!=txt1.value)
     {
         status=false;
         txt.style.border="1px solid red";
         alert("passward and confirm Passward not same");
     }
     else
     {
         txt.style.border="1px solid green";
     }
     return status;
         
         
     }
       

      function submitdataofsingup()
       {
        var status=true;
       
        if(validateuserofsignup()==false)
        {
          status=false;
        }
        if(validateemailofsignup()==false)
        {
          status=false;
        }
        
        if(validatemobileofsignup()==false)
        {
          status=false;
        }

        if(validatepassofsignup()==false)
        {
          status=false;
        }
        
        if(validatecpassofsignup()==false)
        {
          status=false;
        }
       return status;
    }


</script>
@endsection
