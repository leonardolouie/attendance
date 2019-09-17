<header class="main-header">
    <div class="container_header">
        <div class="logo d-flex align-items-center">
            <a href="#"> <strong class="logo_icon"> <img src="{{asset('images/shoppetown.png')}}" alt=""> </strong>
                <span class="logo-default">
                    <img class="img-responsive" src="{{asset('images/shoppetown.png')}}" alt=""
                        style="width:50px; height: 50px; margin-left: 80px;"> </span> </a>
            <div class="icon_menu full_menu">
                <a href="#" class="menu-toggler sidebar-toggler"></a>
            </div>
        </div>
        <div class="right_detail">
            <div class="row d-flex align-items-center min-h pos-md-r">
                <div class="col-xl-12 col-12 d-flex justify-content-end">
                    <div class="right_bar_top d-flex align-items-center">
                        &nbsp;</i> <span class="badge badge-primary badge-text" style="margin-top: 2%;"
                            id="date-today"></span>
                        <!-- Dropdown_User -->
                        <div class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                data-close-others="true" aria-expanded="true"> <img class="img-circle pro_pic" src=""
                                    alt=""> </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                 <a href="/admin/profile"> <i class="icon-user"></i> Profile </a>
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