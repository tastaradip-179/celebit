
<div class='page-topbar '>
    
    <div>
        <a href="{{route('admin.backend.dashboard')}}">
            <span  class='logo-area'></span>
        </a>
    </div>
    <div class='quick-area'>
        <div class='float-left'>
            <ul class="info-menu left-links list-inline list-unstyled">
                <li class="sidebar-toggle-wrap list-inline-item">
                    <a href="#" data-toggle="sidebar" class="sidebar_toggle">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
                <li class="notify-toggle-wrapper list-inline-item">
                    <a href="#" data-toggle="dropdown" class="toggle">
                        <i class="fa fa-bell"></i>
                        <span class="badge badge-pill badge-orange">3</span>
                    </a>
                    <ul class="dropdown-menu notifications animated fadeIn">
                        <li class="total dropdown-item">
                            <span class="small">
                                You have <strong>3</strong> new notifications.
                                <a href="javascript:;" class="float-right">Mark all as Read</a>
                            </span>
                        </li>
                        <li class="list dropdown-item">

                            <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                                <li class="unread available"> <!-- available: success, warning, info, error -->
                                    <a href="javascript:;">
                                        <div class="notice-icon">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <div>
                                            <span class="name">
                                                <strong>Server needs to reboot</strong>
                                                <span class="time small">15 mins ago</span>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                <li class="unread away"> <!-- available: success, warning, info, error -->
                                    <a href="javascript:;">
                                        <div class="notice-icon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div>
                                            <span class="name">
                                                <strong>45 new messages</strong>
                                                <span class="time small">45 mins ago</span>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                <li class=" busy"> <!-- available: success, warning, info, error -->
                                    <a href="javascript:;">
                                        <div class="notice-icon">
                                            <i class="fa fa-times"></i>
                                        </div>
                                        <div>
                                            <span class="name">
                                                <strong>Server IP Blocked</strong>
                                                <span class="time small">1 hour ago</span>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                <li class=" offline"> <!-- available: success, warning, info, error -->
                                    <a href="javascript:;">
                                        <div class="notice-icon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div>
                                            <span class="name">
                                                <strong>10 Orders Shipped</strong>
                                                <span class="time small">5 hours ago</span>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                <li class=" offline"> <!-- available: success, warning, info, error -->
                                    <a href="javascript:;">
                                        <div class="notice-icon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div>
                                            <span class="name">
                                                <strong>New Comment on blog</strong>
                                                <span class="time small">Yesterday</span>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                <li class=" available"> <!-- available: success, warning, info, error -->
                                    <a href="javascript:;">
                                        <div class="notice-icon">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <div>
                                            <span class="name">
                                                <strong>Great Speed Notify</strong>
                                                <span class="time small">14th Mar</span>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                <li class=" busy"> <!-- available: success, warning, info, error -->
                                    <a href="javascript:;">
                                        <div class="notice-icon">
                                            <i class="fa fa-times"></i>
                                        </div>
                                        <div>
                                            <span class="name">
                                                <strong>Team Meeting at 6PM</strong>
                                                <span class="time small">16th Mar</span>
                                            </span>
                                        </div>
                                    </a>
                                </li>

                            </ul>

                        </li>

                        <li class="external dropdown-item">
                            <a href="javascript:;">
                                <span>Read All Notifications</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="d-sm-none d-none searchform list-inline-item">
                    <div class="input-group">
                        <span class="input-group-addon input-focus">
                            <i class="fa fa-search"></i>
                        </span>
                        <form action="search-page.html" method="post">
                            <input type="text" class="form-control animated fadeIn" placeholder="Search & Enter">
                            <input type='submit' value="">
                        </form>
                    </div>
                </li>
            </ul>
        </div>		
        <div class='float-right'>
            <ul class="info-menu right-links list-inline list-unstyled">
                <li class="profile list-inline-item">
                    <a href="#" data-toggle="dropdown" class="toggle">
                        <i class='fa fa-user icon-xs icon-rounded icon-info'></i>
                        <span>@if(Auth::check()) {{ Auth::user()->name }} @endif<i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul class="dropdown-menu profile animated fadeIn">
                        <li class="dropdown-item">
                            <a href="#settings">
                                <i class="fa fa-wrench"></i>
                                Settings
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a href="#profile">
                                <i class="fa fa-user"></i>
                                Profile
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a href="#help">
                                <i class="fa fa-info"></i>
                                Help
                            </a>
                        </li>
                        <li class="last dropdown-item">
                            <a href="{{ route('admin.logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-lock"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                        @csrf
                            </form>
                        </li>
                          
                    </ul>
                </li>
            </ul>			
        </div>		
    </div>

</div>