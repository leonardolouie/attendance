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
	<link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
	<link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('admin/assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('admin/assets/css/ionicons.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('admin/assets/css/simple-line-icons.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('admin/assets/css/jquery.mCustomScrollbar.css')}}" rel="stylesheet">
	<!-- datatables -->
	<link href="/admin/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
	<link href="/admin/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
	<link href="/admin/libs/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />

	<link href="{{asset('admin/assets/fontawesome-free-5.5.0-web/css/brands.css')}}" rel="stylesheet">
	<link href="{{asset('admin/assets/fontawesome-free-5.5.0-web/css/solid.css')}}" rel="stylesheet">

	<link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet">
	<link href="{{asset('admin/assets/css/responsive.css')}}" rel="stylesheet">

	<style>
		html,
		body {
			padding: 0 !important;
			margin: 0 !important;
			box-sizing: border-box;

		}

		h1{
			font-weight: bold;
		}
		.Activated {

			color: green;

		}

		.Deactivated {

			color: red;
		}

		.sidebar-menu li a {
			color: #227dc7;
		}

		.badge-text {
			font-size: 1rem;
		}

		.badge-primary {
			background: rgb(121, 172, 251) !important;
		}

		.btn-primary {
			background: rgb(121, 172, 251) !important;
			border-color: rgb(121, 172, 251) !important;
		}

		.btn-primary:hover {
			background: rgb(77, 118, 183) !important;
			border-color: rgb(77, 118, 183) !important;
		}

		.btn-danger:hover {
			background: #bb3c65 !important;
			border-color: #bb3c65 !important;
		}

		.footer {
			background: #fff !important;
			z-index: 99;
		}

		.copy_right p {
			color: rgb(121, 172, 251) !important;
		}
		.parent-item,.breadcrumb i {
			color: #227dc7 !important;
		}
	</style>


</head>

<body>
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

<script>
	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = today.getFullYear();

	today = mm + '/' + dd + '/' + yyyy;

	document.getElementById('date-today').innerHTML = today;
</script>

<script type="text/javascript" src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/assets/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('admin/assets/js/custom.js')}}" type="text/javascript"></script>


@yield('script')

<!-- datatables -->
<script src="/admin/libs/datatables/jquery.dataTables.min.js"></script>
<script src="/admin/libs/datatables/dataTables.bootstrap4.js"></script>


<!-- <script src="/libs/datatables/dataTables.responsive.min.js"></script> -->
<!-- <script src="/libs/datatables/responsive.bootstrap4.min.js"></script> -->

<!-- Datatables init -->
<script src="/js/datatables.init.js"></script>

<script src="/admin/libs/datatables/dataTables.buttons.min.js"></script>
<script src="/admin/libs/datatables/buttons.bootstrap4.min.js"></script>
<script src="/admin/libs/datatables/buttons.html5.min.js"></script>
<script src="/admin/libs/datatables/buttons.flash.min.js"></script>
<script src="/admin/libs/datatables/buttons.print.min.js"></script>
<script src="/admin/libs/datatables/dataTables.keyTable.min.js"></script>
<script src="/admin/libs/datatables/dataTables.select.min.js"></script>

</html>