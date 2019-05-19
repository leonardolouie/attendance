<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Attendance admin</title>
	<link rel="shortcut icon" type="image/x-icon" href="shoppetown_icon.ico">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('admin/assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('admin/assets/css/ionicons.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('admin/assets/css/simple-line-icons.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('admin/assets/css/jquery.mCustomScrollbar.css')}}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

	<link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet">
	<link href="{{asset('admin/assets/css/responsive.css')}}" rel="stylesheet">
      
     <style> 

        .Activated
        {

         color:green;

        }
        .Deactivated
        {

        	color:red;
        }

     </style>


</head>

<body class="nav_small">
	<div class="wrapper">
		<!-- header -->
		@include('root.layouts.header')
		<!-- header_End -->
		<!-- Content_right -->
		<div class="container_full">

		    @include('root.layouts.left_content')




			<div class="content_wrapper">

				@yield('content')
				
			</div>
		</div>
		<!-- Content_right_End -->
		<!-- Footer -->
	      @include('root.layouts.footer')
		<!-- Footer_End -->
	</div>
	

</body>

<script type="text/javascript" src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('admin/assets/js/popper.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('admin/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('admin/assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
	<script src="{{asset('admin/assets/js/custom.js')}}" type="text/javascript"></script>


	@yield('script')
    <!-- DataTable -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

</html>