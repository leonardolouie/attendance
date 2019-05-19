@extends('root.layouts.app')
@section('content')
<div class="container-fluid">
    <!-- breadcrumb -->
    <div class="page-heading">
        <div class="row d-flex align-items-center">
            <div class="col-md-6">
                <div class="page-breadcrumb">
                    <h1>Employee Attendance</h1>
                </div>
            </div>
            <div class="col-md-6 justify-content-md-end d-md-flex">
                <div class="breadcrumb_nav">
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a class="parent-item" href="{{route('admin.dashboard')}}">Home</a>
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

        <div class="card">
      
        <div class="card-header"> 
             <p>{{$users->last_name}}, {{$users->first_name}}  {{$users->middle_name}}</p>

        </div>

        <div class="card-body">
        <table id="myTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Coordinates</th>
                    <th>Address</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendances as $attendance)

                 <tr>
                     
                  <td>{{$attendance->date}}</td>
                  <td>{{$attendance->coordinates}}</td>
                  <td>{{$attendance->address}}</td>
                  <td>{{$attendance->time_in}}</td>
                  <td>{{$attendance->time_out}}</td>

                 </tr>
                @endforeach
              
                
            </tbody>
            <tfoot>
            <tr>
                    <th>Date</th>
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
</script>
@endsection