@extends('layouts.cdn')
@section('body-part')
    

<!-- Navbar -->
 <x-portalnavbar/>
<!-- /.navbar -->

<!--sidenavbar -->
<x-portalsidenavbar/>
<!--/.sidenavbar-->
  

  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashbr</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          @foreach($master_datas as $master_data)
          <!-- ./col -->
         @if(strtotime(date('y-m-d'))<strtotime($master_data->exam_date))
       @php $ccolor="bg-success" @endphp
         @else
         @php $ccolor="bg-danger" @endphp 
         @endif
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box {{$ccolor}}">
              <div class="inner">
                <h3>{{$master_data->tittle}}<sup style="font-size: 20px"></sup></h3>

                <p>{{$master_data->exam_date}}({{$master_data->cat_name}})</p>
              </div>
              <div class="icon">
                <i class="fa fa-file-alt"></i>
              </div>
              @if(strtotime(date('y-m-d'))<strtotime($master_data->exam_date))
             
              <a href="/portal/exam_form/{{$master_data->id}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              @else
              <p class="small-box-footer">Exam Completed</p>
              @endif
            </div>
          </div>
          <!-- ./col -->
          
         @endforeach

          <!-- ./col -->
        </div>
        <!-- /.row -->
    

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  @endsection