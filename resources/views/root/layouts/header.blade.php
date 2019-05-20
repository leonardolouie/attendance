<header class="main-header">
			<div class="container_header">
				<div class="logo d-flex align-items-center">
					<a href="#"> <strong class="logo_icon"> <img src="{{asset('images/logo.png')}}" alt=""> </strong> <span class="logo-default">
							<img src="{{asset('images/logo.png')}}" alt="" style="width:50px; height: 50px; margin-left: 80px;"> </span> </a>
					<div class="icon_menu full_menu">
						<a href="#" class="menu-toggler sidebar-toggler"></a>
					</div>
				</div>
				<div class="right_detail">
					<div class="row d-flex align-items-center min-h pos-md-r">
						<div class="col-xl-12 col-12 d-flex justify-content-end">
							<div class="right_bar_top d-flex align-items-center">
                               <p style="margin-top: 2%;"id="date-today"></p>
								{{-- <!-- DropDown_Inbox -->
								<div class="dropdown dropdown-inbox">
									<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
										<i class="fa fa-envelope-o"></i> <span class="badge_coun"> 2 </span> </a>
									<ul class="dropdown-menu scroll_auto height_fixed">
										<li class="bigger">
											<h3><span class="bold">Messages</span></h3>
											<span class="notification-label">New 2</span>
										</li>
										<li>
											<ul class="dropdown-menu-list">
												<li>
													
														<span class="subject"> <span class="from"> Sarah Smith </span> <span class="time">Just Now </span> </span>
														<span class="message"> Jatin I found you on LinkedIn... </span> </a>
												</li>
												<li>
													
														<span class="subject"> <span class="from"> Sarah Smith </span> <span class="time">Just Now </span> </span>
														<span class="message"> Jatin I found you on LinkedIn... </span> </a>
												</li>
												<li>
													
														<span class="subject"> <span class="from"> Sarah Smith </span> <span class="time">Just Now </span> </span>
														<span class="message"> Jatin I found you on LinkedIn... </span> </a>
												</li>
												<li>
													
														<span class="subject"> <span class="from"> Sarah Smith </span> <span class="time">Just Now </span> </span>
														<span class="message"> Jatin I found you on LinkedIn... </span> </a>
												</li>
												<li>
													
														<span class="subject"> <span class="from"> Sarah Smith </span> <span class="time">Just Now </span> </span>
														<span class="message"> Jatin I found you on LinkedIn... </span> </a>
												</li>
												<li>
													
														<span class="subject"> <span class="from"> Sarah Smith </span> <span class="time">Just Now </span> </span>
														<span class="message"> Jatin I found you on LinkedIn... </span> </a>
												</li>
											</ul>
										</li>
									</ul>
								</div> --}}
								<!--DropDown_Inbox_End -->
								<!-- Dropdown_User -->
								<div class="dropdown dropdown-user">
									<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"
									 aria-expanded="true"> <img class="img-circle pro_pic" src="assets/images/about-.jpg" alt=""> </a>
									<ul class="dropdown-menu dropdown-menu-default">
										<li>
											<a href="#"> <i class="icon-user"></i> Profile </a>
										</li>
										
										<li class="divider"></li>
										
										<li>
											<a href="{{route('logout.submit')}}"> <i class="icon-logout"></i> Log Out </a>
										</li>
									</ul>
								</div>
								<!-- Dropdown_User_End -->
							</div>
						</div>
					</div>
				</div>
			</div>

		</header>