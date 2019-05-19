@extends('root.layouts.app')


@section('content')

<div class="container-fluid">
    <!-- breadcrumb -->
    <div class="page-heading">
        <div class="row d-flex align-items-center">
            <div class="col-md-6">
                <div class="page-breadcrumb">
                    <h1>Dashboard</h1>
                </div>
            </div>
            <div class="col-md-6 justify-content-md-end d-md-flex">
                <div class="breadcrumb_nav">
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a class="parent-item" href="index.html">Home</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">
                            Dashboard
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb_End -->
    <!-- Section -->
    <section class="chart_section">


      <div class="row">
              <div class="col-xl-4 col-md-5">
                <div class="info_items bg_green d-flex align-items-center">
                  <span class="info_items_icon">
                    <i class="ion-android-people"></i>
                  </span>
                  <div class="info_item_content">
                    <span class="info_items_text">Total Employee</span>
                    <span class="info_items_number">450</span>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-5">
                <div class="info_items bg_yellow d-flex align-items-center">
                  <span class="info_items_icon">
                    <i class="ion-android-people"></i>
                  </span>
                  <div class="info_item_content">
                    <span class="info_items_text">Attendance Today</span>
                    <span class="info_items_number">450</span>
                  </div>
                </div>
              </div>
       </div>
        <div class="card">
      
      <div class="card-header">
         <h1>Attendance Today</h1>
      </div>
      <div class="card-body">
        <table id="myTable" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>Name</th>
              <th>Coordinates</th>
              <th>Address</th>
              <th>Time In</th>
              <th>Time Out</th>
            </tr>
          </thead>
          <tbody>
        
          </tbody>
          <tfoot>
          <tr>
            <th>Name</th>
              <th>Coordinates</th>
              <th>Address</th>
              <th>Time In</th>
              <th>Time Out</th>
          </tr>
          </tfoot>
        </table>
      </div>
    </div>
      
        
    </section>
    <!-- Section_End -->
</div>


@endsection

@section('script')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {


$('#myTable').DataTable();
} );

   list();

  function list()
  { 
       

       $.get("api/todaylist", function(response) {
            
           

            console.log(response);
               
           
             var value ="";
           $.each(response,function(key,value){
      
               value +="<tr>";
               value +="<td>"+value.first_name+"</td>";
               value +="<td>"+value.coordinates+"</td>";
               value +="<td>"+value.address+"</td>";
               value +="<td>"+value.time_in+"</td>";
               value +="<td>"+value.time_out+"</td>";
               value +="</tr>";    

               console.log(value);
               $("#myTable").append(value.coordinates);
              
           });

           
            
       });



  }





</script>
@endsection