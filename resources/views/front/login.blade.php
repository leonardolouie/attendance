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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{asset('css/app.css') }}" rel="stylesheet">
    <style>
    #time{
    }
    </style>
  </head>
  <body onload="startTime()">
    @if(Auth::guard('admin')->check())

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
         <strong><h6>Warning</h6><b>{{Auth::guard('admin')->user()->username}}</b> You are currently logged in click <a href="{{route('admin.dashboard')}}">Dashboard</a> to redirect</strong>
   </div>
 

 {{--    @elseif(Auth::guard('user')->check())
     <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong><b>{{Auth::guard('user')->user()->username}}</b> You are currently logged in click <a href="{{route('admin.dashboard')}}">Dashboard</a> to redirect</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
   </div> --}}
    @endif
    <div class="container" style="margin-top: 10%">
      <div class="row justify-content-center">
        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{Session::get('message')}}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        @if(Session::has('message_error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>{{Session::get('message_error')}}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        
      </div>
      <div class="row justify-content-center">
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
              <div style="float: left">Login</div>
              <div style="float: right;" id="time"></div>
           
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('login') }}">
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

                     @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                     @endif
                    
                  </div>
                </div>
                
              </form>
            </div>
            <div class="card-footer">
                 <div id="date-today" style="float: left;"> </div>
              <a href="admin/login" style="float: right">Admin Login</a>
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


var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = mm + '/' + dd + '/' + yyyy;
  
document.getElementById('date-today').innerHTML = today;

</script>