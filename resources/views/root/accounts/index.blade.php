@extends('root.layouts.app')
@section('content')
<div class="container-fluid">
  <!-- breadcrumb -->
  <div class="page-heading">
    <div class="row d-flex align-items-center">
      <div class="col-md-6">
        <div class="page-breadcrumb">
          <h1>User Accounts</h1>
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
            <li>
              <a class="parent-item" href="{{route('admin.dashboard')}}">Accounts</a>
              <i class="fa fa-angle-right"></i>
            </li>
            <li class="active">
              User Account
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- breadcrumb_End -->
  <!-- Section -->
  <!-- Section -->
  @if(Session::has('message_create'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{Session::get('message_create')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  <section class="chart_section">
    <div class="card">
      
      <div class="card-header">
        <a class="btn btn-primary" href="{{route('admin.accounts.create')}}">Create new user account </a>
      </div>
      <div class="card-body">
      <div class="table-responsive">
            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
              <thead>
              <tr>
              <th>Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Date Created</th>
              <th>Actions</th>
            </tr>
              </thead>
              <tbody>
            
            @foreach($users as $user)
            <tr>
              <td>{{$user->last_name .', '.$user->first_name}}</td>
              <td>{{$user->username}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->created_at}}</td>
              <td><a class="btn btn-primary btn-xs" style="color:#fff;" href="accounts/{{$user->id}}/edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>

                <a class="btn btn-danger btn-xs" href="accounts/{{$user->id}}/deactivate" data-toggle="tooltip" data-placement="top" title="Deactivate Account"><i class="fa fa-lock"></i></a></td>
            </tr>
            @endforeach
            
          </tbody>
            </table>
          </div>
      </div>
    </div>
</section>
<!-- Section_End -->
</div>
@endsection
@section('script')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

@endsection