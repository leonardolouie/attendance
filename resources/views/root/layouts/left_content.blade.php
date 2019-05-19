	<div class="side_bar scroll_auto">

				<ul id="dc_accordion" class="sidebar-menu tree">
					<li class="{{ in_array(Route::currentRouteName(), ['admin.dashboard']) ? 'active' : '' }}">
						<a href="{{url('admin/dashboard')}}"> <i class="fa fa-home"></i> <span>Dashboard</span> </a>


					</li>
					
					{{-- <li class="menu_sub">
						<a href=""> <i class="icon-grid"></i><span>Gallery</span> <span class="arrow"></span> </a>
						<ul class="down_menu">
							<li>
								<a href="view-album.html">View album</a>
							</li>
							<li>
								<a href="create-album.html">Create New</a>
							</li>
						</ul>		
					</li> --}}
					<li class="menu_sub {{in_array(Route::currentRouteName(), ['admin.view.attendance','admin.employee.attendance']) ? 'active' : '' }}">
						<a href="#"><i class="icon-globe"></i><span>Attendance</span> <span class="arrow"></span> </a>
						<ul class="down_menu">
							<li>
								<a href="{{route("admin.view.attendance")}}">View Attendance</a>
							</li>
							<li>
								<a href="{{route("admin.employee.attendance")}}">Employee Attendance</a>
							</li>
						</ul>
					</li>
					<li class="menu_sub {{in_array(Route::currentRouteName(), ['admin.accounts.index','admin.accounts.deactivated','admin.accounts.create','admin.accounts.submit','']) ? 'active' : '' }}">
						<a href="#"> <i class="icon-people"></i><span>Accounts</span> <span class="arrow"></span> </a>
						<ul class="down_menu">
							<li>
								<a href="{{route('admin.accounts.index')}}">View accounts</a>
							</li>
							<li>
								<a href="{{route('admin.accounts.deactivated')}}">Deactivated Accounts</a>
							</li>
							
						</ul>
					</li>
					{{-- <li class="">
						<a href="view-messages.html"> <i class="ion-chatboxes"></i><span>Messages</span>	</a>
					</li>
					<li class="">
						<a href="#"> <i class="icon-settings"></i></i> <span>Manage</span></a>
					</li> --}}

				</ul>
			</div>