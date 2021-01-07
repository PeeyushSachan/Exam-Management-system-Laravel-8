@extends('layouts.cdn')
@section('body-part')
<div class="hold-transition register-page">

    <div class="login-box">
        <div class="login-logo">
          <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
      
            <form action="/student/login_access" method="post" onsubmit="return submitdataofsingup()">
              @csrf
              <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" id="singup_email" name="email">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
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
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="remember">
                      Remember Me
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
      
           <!-- <div class="social-auth-links text-center mb-3">
              <p>- OR -</p>
              <a href="#" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
              </a>
              <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
              </a>
            </div>-->
            <!-- /.social-auth-links -->
      
            <p class="mb-1">
              <a href="forgot-password.html">I forgot my password</a>
            </p>
            <p class="mb-0">
              <a href="signup" class="text-center">Register a new membership</a>
            </p>
          </div>
          <!-- /.login-card-body -->
        </div>
      </div>


</div>

<script>
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

      function submitdataofsingup()
       {
        var status=true;
       
        if(validateemailofsignup()==false)
        {
          status=false;
        }
      
        if(validatepassofsignup()==false)
        {
          status=false;
        }
        
     
       return status;
    }
</script>
@endsection