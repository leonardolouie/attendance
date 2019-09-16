@extends('root.layouts.app')
@section('content')
<div class="container-fluid">
    <!-- breadcrumb -->
    <div class="page-heading">
        <div class="row d-flex align-items-center">
            <div class="col-md-6">
                <div class="page-breadcrumb">
                    <h1><b>Edit User Account</b></h1>
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

                            <a class="parent-item" href="">Accounts</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">
                            Edit Account
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
        @csrf
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary float-right" href="{{route('admin.accounts.index')}}">View Accounts</a>
            </div>
            <div class="card-body">
                <div class="container">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(Session::has('message_create'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{Session::get('message_create')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="">
                                <h2>User information</h2>
                                <br />
                            </div>
                            <form action="{{route('admin.accounts.update')}}" method="POST">
                                @csrf
                                @foreach($users as $user)
                                <div class="form-group row">
                                    <input name="id" type="hidden" value={{$user->id}} />
                                    <label for="first_name" class="col-sm-2 col-form-label col-form-label-sm">First
                                        Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="first_name"
                                            placeholder="First Name" value="{{$user->first_name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="last_name" class="col-sm-2 col-form-label col-form-label-sm">Last
                                        Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name"
                                            required="" value="{{$user->last_name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="middle_name" class="col-sm-2 col-form-label col-form-label-sm">Middle
                                        Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="middle_name"
                                            placeholder="Middle Name" required="" value="{{$user->middle_name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" id="email" class="form-control" name="email"
                                            placeholder="Email Address" required="" value="{{$user->email}}">
                                        <span class="alert" id="email_alert" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username"
                                        class="col-sm-2 col-form-label col-form-label-sm">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="username"
                                            placeholder=" Enter Username" required="" value="{{$user->username}}">
                                    </div>
                                </div>
                                <div class="">
                                    <hr />
                                    <button class="btn btn-primary float-left" data-toggle="tooltip"
                                        data-placement="top" title="Update Account">Save</button>
                                </div>
                            </form>
                        </div>
                        &nbsp
                        <div class="col-md-12">
                            <div class="">
                                <form id="password-change__form" action="{{route('admin.accounts.updatepassword')}}"
                                    method="POST">
                                    @csrf
                                    <h2>Password Change</h2>
                                    <br />
                                    <input name="id" type="hidden" value={{$user->id}} />
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label col-form-label-sm">New
                                            Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" id="password" class="form-control" name="password"
                                                placeholder="New Password" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="retype_password"
                                            class="col-sm-2 col-form-label col-form-label-sm">Retype_Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" id="retype_password" class="form-control"
                                                placeholder=" Retype Password" required="">
                                            <div id="password_span"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="">
                                <hr />
                                <button id="submit" class="btn btn-primary float-left" data-toggle="tooltip"
                                    data-placement="top" title="Update Account">Save Password</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
    </section>
    <!-- Section_End -->
</div>

<br />
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script type="text/javascript" src="{{asset('js/validation.js')}}"></script>
<script>
    $(document).ready(function () {
        $("#submit").click(function () {
            $("#password-change__form").submit();
        })
    })
</script>
@endsection