
@extends('root.layouts.app')


@section('content')

<div class="container-fluid">
    <!-- breadcrumb -->
    <div class="page-heading">
        <div class="row d-flex align-items-center">
            <div class="col-md-6">
                <div class="page-breadcrumb">
                    <h1>Deactivated User Accounts</h1>
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
    <!-- Section -->

     @if(Session::has('message_activate'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{Session::get('message_activate')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>

    @endif
    <section class="chart_section">

        <div class="card">
        <div class="card-body">
        <table id="myTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Date Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
              
                @foreach($users as $user)
                     <tr>
                     <td>{{$user->last_name .', '.$user->first_name.' '. $user->middle_name}}</td>
                     <td>{{$user->username}}</td>
                     <td>{{$user->email}}</td>
                     <td>{{$user->updated_at}}</td>
                     <td><a class="btn btn-success btn-xs" href="{{$user->id}}/activate" data-toggle="tooltip" data-placement="top" title="Activate Account">Activate</button></td>
                     </tr>
                @endforeach
                
            </tbody>
            <tfoot>
            <tr>
                 <th>Name</th>
                 <th>Username</th>
                 <th>Email</th>
                 <th>Actions</th>
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

