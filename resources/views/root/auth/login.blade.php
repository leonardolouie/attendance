<!DOCTYPE html>
<html>
  <head>
    <title> </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    #time{
    }
    </style>
  </head>
  <body onload="startTime()">

    @if(Session::has('message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{Session::get('message')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>

    @endif
    <div class="container" style="margin-top: 10%">
      <div class="row justify-content-center">
        <div class="col-md-9">
          
          <div class="card">
            <div class="card-header">
              <div style="float: left">Admin Login</div>
              <div style="float: right;" id="time"></div>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <div class="form-group row">
                  <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                  <div class="col-md-6">
                    <input id="text" type="text" class="form-control"  name="username" value="{{ old('username') }}" required autofocus>
                    
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                  <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                         

                    @if ($errors->any())
                    <div style="font-size: 10px; color: red">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                
                   @if(Session::has('password_koto'))
                    <span role="alert" style="font-size: 10px; color: red">
                      <strong>{{ Session::get('password_koto') }}</strong>
                    </span>
                    @endif

                   
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                    </button>
              
                  </div>
                </div>
                
              </form>
            </div>
             <div class="card-footer">
              
              <a href="{{route('user.login')}}" style="float: right; ">User accounts</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<script>
function startTime() {
var today = new Date();
var h = today.getHours();
var m = today.getMinutes();
var s = today.getSeconds();
m = checkTime(m);
s = checkTime(s);
document.getElementById('time').innerHTML =
h + ":" + m + ":" + s;
var t = setTimeout(startTime, 500);
}
function checkTime(i) {
if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
return i;
}

$('.alert').alert();
</script>