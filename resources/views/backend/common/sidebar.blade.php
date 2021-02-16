<!-- SIDEBAR - START -->
<div class="page-sidebar ">

    <!-- MAIN MENU - START -->
    <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 

        <ul class='wraplist'>	

            <li class="open"> 
                <a href="{{route('backend.admin.dashboard')}}">
                    <i class="fa fa-dashboard"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class=""> 
                <a href="javascript:;">
                    <i class="fa fa-users"></i>
                    <span class="title">Celebrities</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu" >
                    <li>
                        <a class="" href="{{route('backend.admin.celebrities.index')}}" >All Celebrities</a>
                    </li>
                    <li>
                        <a class="" href="{{route('backend.admin.celebrities.create')}}" >Add Celebrity</a>
                    </li>
                    <li>
                        <a class="" href="{{route('backend.admin.celebritypackages.create')}}" >Celebrity Packages</a>
                    </li>
                </ul>
            </li>
            <li class=""> 
                <a href="javascript:;">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Components</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu" >
                    <li>
                        <a class="" href="{{route('backend.admin.tags.index')}}" >Manage Tags</a>
                    </li>
                    <li>
                        <a class="" href="{{route('backend.admin.packages.index')}}" >Manage Packages</a>
                    </li>
                    <li>
                        <a class="" href="{{route('backend.admin.categories.index')}}" >Manage Categories</a>
                    </li>
                </ul>
            </li>
            <li class=""> 
                <a href="javascript:;">
                    <i class="fa fa-users"></i>
                    <span class="title">Customers</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu" >
                    <li>
                        <a class="" href="{{route('backend.admin.customers.index')}}" >All Customers</a>
                    </li>
                </ul>
            </li>
            <li class=""> 
                <a href="javascript:;">
                    <i class="fa fa-envelope"></i>
                    <span class="title">Requests</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu" >
                    <li>
                        <a class="" href="{{route('backend.admin.requests.index')}}" >All Requests</a>
                    </li>
                </ul>
            </li>

        </ul>

    </div>
    <!-- MAIN MENU - END -->



    <div class="project-info">

        <div class="block1">
            <div class="data">
                <span class='title'>New Songs</span>
                <span class='total'>4247</span>
            </div>
            <div class="graph">
                <span class="sidebar_orders">...</span>
            </div>
        </div>

        <div class="block2">
            <div class="data">
                <span class='title'>Visitors</span>
                <span class='total'>3146</span>
            </div>
            <div class="graph">
                <span class="sidebar_visitors">...</span>
            </div>
        </div>

    </div>



</div>
<!--  SIDEBAR - END -->