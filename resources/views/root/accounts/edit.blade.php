@extends('root.layouts.app')
@section('content')
<div class="container-fluid">
    <!-- breadcrumb -->
    <div class="page-heading">
        <div class="row d-flex align-items-center">
            <div class="col-md-6">
                <div class="page-breadcrumb">
                    <h1>Edit User Account</h1>
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
    <section class="chart_section">
        <div class="card">
       @if(Session::has('message_create'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{Session::get('message_create')}}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif

            <div class="card-header">
                <a class="btn btn-success" href="{{route('admin.accounts.index')}}">View Accounts  <i class="fas fa-eye"></i></a>
            </div>
            <div class="card-body">
                <div class="row" style="margin-bottom: 2%;">
                    <div class="col-md-12" style="text-align: center">
                        <h1>User Information</h1>
                    </div>
                </div>
                <form action="{{route('admin.accounts.update')}}" method="POST">
                    @csrf

                    @foreach($users as $user)

                    <input name="id" type ="hidden" value="{{$user->id}}">
                    <div class="row">

                        <div class= "col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{$user->first_name}}">
                            </div>
                            
                        </div>
                        <div class= "col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" required="" value="{{$user->last_name}}">
                            </div>
                            
                        </div>
                        
                        
                    </div>
                    <div class="row">

                        <div class= "col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" required="" value="{{$user->middle_name}}">
                            </div>
                            
                        </div>
                        <div class= "col-md-12">
                            <div class="form-group">
                                <input type="email" id="email" class="form-control" name="email" placeholder="Email Address" required="" value="{{$user->email}}">
                                <span class="alert" id="email_alert" style="color: red"></span>
                            </div>
                            
                        </div>
                         <div class= "col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder=" Enter Username" required="" value="{{$user->username}}">
                            </div>
                            
                        </div>
                    </div>



                    <div class="row">

                        <div class= "col-md-12" >
                            <button  class="btn btn-primary" style="float:right" data-toggle="tooltip" data-placement="top" title="Edit account">Edit Account <i class="fas fa-edit"></i></button>
                            
                        </div>
                    </div>
                    @endforeach
                </form>

               <form action="{{route('admin.accounts.updatepassword')}}" method="POST">
                @csrf

                    @foreach($users as $user)

                    <input name ="id" type ="hidden" value="{{$user->id}}">
                    @endforeach
                <div class="row" style="margin-top: 2%">
                    <div class="col-md-12" style="text-align: center;margin-bottom: 2%">
                        <h1>Change Password</h1>
                    </div>
                    <div class= "col-md-12">
                        <div class="form-group">
                            <input type="password" id="password" class="form-control" name="password" placeholder=" Password" required="" value="{{old('password')}}">
                        </div>

                    </div>
                    <div class= "col-md-12">
                        <div class="form-group">
                            <input type="password" id="retype_password" class="form-control" placeholder=" Retype Password" required="">
                        </div>
                        <div id="password_span"></div>

                    </div>


                </div>
                <div class="row">

                    <div class= "col-md-12" >
                        <button id="submit" class="btn btn-primary" style="float:right" data-toggle="tooltip" data-placement="top" title="Update password only">Change Password <i class="fas fa-edit"></i></button>

                    </div>
                </div>
                </form>


            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </section>
    <!-- Section_End -->
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{asset('js/validation.js')}}"></script>
@endsection