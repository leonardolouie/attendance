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
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!-- Styles -->
  <link href="{{asset('css/app.css') }}" rel="stylesheet">
  <style>
    html,
    body {
      padding: 0 !important;
      overflow-x: hidden !important;
      margin: 0;
      background: #5b866b;
      box-sizing: border-box;
    }


  

   .page-footer {
     position: absolute;
     bottom:0;
     margin-top:400px;
     width: 100%;
   }
   .footer-text{
     color:#fff;
   }
    .card {
      
    }

  


    .input-group-text i {
      color: #7bb18f;
      font-size: 1.2rem;
    }

    .redirect{
      
      margin-top: 20px; 
    }
  .redirect small  {
     
      color:#fff;
      font-size: 0.8rem;
    }

    .redirect a{
      color: #54b2ff;
      font-size: 1rem;
      text-decoration: none;
    }
    .badge-text{
      font-size: 1.2rem;
      font-weight: bold;
    }

    .card-title i {
      color: #7bb18f;
    }
    .dt i{
      font-size: 1.2rem;
    }
    .btn-user {
  background-color: #7bb18f;
    color:#fff;
 
}

.btn-user:hover {
  background-color: #578267;
    color:#fff;
 
}

  </style>
</head>
<body onload="startTime()">
  @if(Auth::guard('admin')->check())
  
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong><h6>Warning</h6><b>{{Auth::guard('admin')->user()->username}}</b> You are currently logged in click <a href="{{route('admin.dashboard')}}">Dashboard</a> to redirect</strong>
  </div>
  @endif
  <div class="container" style="margin-top: 6%;">
    <div class="row">
      <div class="col-md-7 col-xs-12 col-sm-12 mx-auto d-block">
        <div class="card">
          <div class="card-header">
            <h4 class="float-left card-title"> <i class="fa fa-cogs"></i> <b>User</b></h4>
            <div class="dt float-right">
            <span class=" badge-text" id="time"></span>
            </div>
            
          </div>
          <div class="card-body">
            <form method="POST" action=" {{ route('login') }}">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="text">{{ __('Username') }}</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fa fa-user"></i></div>
                    </div>
                      <input id="text" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus placeholder="Username">
                      </div>
                    <small class="text-muted">Please enter your username ex. user</small>

                  </div>
                  <div class="form-group">
                    <label for="password"> {{ __('Password') }}</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fa fa-lock"></i></div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Password">
                    </div>

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
                    <br />
                   
                    <button type="submit" class="btn btn-user">
                      {{ __('Login') }}
                    </button>


                  </div>
                </div>
                <div class="col-md-4  mx-auto d-block">
                  <img class="mx-auto d-block" src="/images/secuser.svg" alt="" style="  width:230px;">
                </div>
              </div>



            </form>
          </div>
          <!-- <div class="card-footer">
              
            </div> -->
           
        </div>
        <div class="redirect">
        <small><span>&#8592;</span> Login as </small><a href="/admin/login">Admin account</a>
        </div>
        
        
      </div>

    </div>
    
  </div>
  <br/><br/>
  <!-- Footer -->
<footer class="page-footer">

<!-- Copyright -->
<div class="footer-copyright text-center py-3 footer-text">© 2019 Copyright:
  <a href="#" class="footer-text"> Shoppetown Property Management and Leasing</a>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->
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