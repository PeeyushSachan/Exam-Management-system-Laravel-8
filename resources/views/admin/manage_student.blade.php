

@extends('layouts.cdn')
@section('body-part')
    

<!-- Navbar -->
 <x-navbar/>
<!-- /.navbar -->

<!--sidenavbar -->
<x-sidenavbar/>
<!--/.sidenavbar-->
  

  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('sweet::alert')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
             
  
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title mb-1">DataTable with default features</h3>
                  <div class="card-tools">

                    
                    <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#modal-default"   title="add btn">
                      <img src="/assets/svg/add-btn.svg"  class="img-fluid" /></button>
                     
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Id</th>
                      <th>name</th>
                      <th>email</th>
                      <th>mobile</th>
                      <th>Categories</th>
                      <th>exam</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach($datas as $data)

                    <tr>
                      <td>{{$data->id}}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->email}}</td>
                      <td>{{$data->mobile}}</td>
                      <td>{{$data->category}}</td>
                      <td>{{$data->exam}}</td>


                      <td>  @if($data->status=="1")
                      <img src="/assets/svg/check.svg" class="img-fluid" />
                        @else
                        <img  src="/assets/svg/cross.svg" class="img-fluid" />
                        @endif
                      
                      </td>
                      
                      <td>
                        
                        <div class="btn-group">
                          <button type="button" class="btn btn-warning"  onclick="edit_Rec( name='{{$data->name}}',status='{{$data->status}}',id='{{$data->id}}')"   data-toggle="modal" data-target="#modal-Edit"  name="edit-btn" title="edit btn" >
                            <img src="/assets/svg/edit-btn.svg"  class="img-fluid"/></button>
                                 <form  action="../admin/delete_category/{{$data->id}}" method="post"  onsubmit="return del_Rec()">
                                  {{ method_field('delete') }}
                                  @csrf
                                  <button type="submit" class="btn btn-danger"    title="delete btn">
                                  
                              <img src="/assets/svg/delete-btn.svg"  class="img-fluid"/></button>
                            </form>
                      </div>
                    </td>
                    </tr>
    


                   
     







                    @endforeach
                    
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>mobile</th>
                        <th>Categories</th>
                        <th>exam</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
      


      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
             
              
              <h4 class="modal-title">Add New record</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>


            <div class="modal-body">
              <form  action="/admin/add_manage_exam" method="post" >
               @csrf

               <div class="form-group">
                <div class="col-auto">    
           <label >Name</label>
            <div class="input-group mb-2">
               <div class="input-group-prepend">
                 <div class="input-group-text"><i class="fas fa-user"></i></div>
               </div>      
       <input type="text" class="form-control"   placeholder="Enter  Name"  name="name"   required>
          
         </div>
       </div> 
         </div>

         <div class="form-group">
            <div class="col-auto">    
       <label >email</label>
        <div class="input-group mb-2">
           <div class="input-group-prepend">
             <div class="input-group-text"><i class="fa fa-envelope"></i></div>
           </div>      
   <input type="email" class="form-control"   placeholder="Enter email"  name="email"   required>
      
     </div>
   </div> 
     </div>

     <div class="form-group">
        <div class="col-auto">    
   <label >Mobile</label>
    <div class="input-group mb-2">
       <div class="input-group-prepend">
         <div class="input-group-text"><i class="fa fa-mobile"></i></div>
       </div>      
<input type="text" class="form-control"   placeholder="Enter  mobile"  name="mobile"   required>
  
 </div>
</div> 
 </div>

 <div class="form-group">
    <div class="col-auto">    
<label >Select Category</label>
<select class="form-control"  name="category" required>
<option disabled selected value> -- select an option -- </option>

<option value="jbj n "></option> 
<option value="jbj n "></option>
</select>  
</div>

</div>


            <div class="form-group">
             <div class="col-auto">    
            <label >Exam</label>
            <div class="input-group mb-2">
            <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></div>
            </div>      
           <input type="text" class="form-control"   placeholder="Enter Exam date Name"  name="Exam"   maxlength="20" required>
             </div>
           </div>
             </div>

             <div class="form-group">
                <div class="col-auto">    
               <label >password</label>
               <div class="input-group mb-2">
               <div class="input-group-prepend">
               <div class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></div>
               </div>      
              <input type="password" class="form-control"   placeholder="Enter Exam date Name"  name="Exam"   maxlength="20" required>
                </div>
              </div>
                </div>

               

           




            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Save changes</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>





     



    





    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<script>




function del_Rec()
{



  
 var status=true;
  var x=confirm ("are you sure to delete this data");
if(x==true)
{
  var status=true;
}
else
{
  var status=false;
}
 return status;
}

</script>



  
  @endsection