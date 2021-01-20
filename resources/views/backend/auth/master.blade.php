<!DOCTYPE html>
<html class=" ">
    <head>
        <!-- 
         * @Package: Ultra Admin - Responsive Theme
         * @Subpackage: Bootstrap
         * @Version: B4-1.3
         * This file is part of Ultra Admin Theme.
        -->
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Celebrity App </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.png')}}" type="image/x-icon" />    <!-- Favicon -->
        <link rel="apple-touch-icon-precomposed" href="{{asset('backend/assets/images/apple-touch-icon-57-precomposed.png')}}"> <!-- For iPhone -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('backend/assets/images/apple-touch-icon-114-precomposed.png')}}">    <!-- For iPhone 4 Retina display -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('backend/assets/images/apple-touch-icon-72-precomposed.png')}}">    <!-- For iPad -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('backend/assets/images/apple-touch-icon-144-precomposed.png')}}">    <!-- For iPad Retina display -->


        @include('backend.common.includes.style')

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <link href="{{asset('backend/assets/plugins/morris-chart/css/morris.css')}}" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/jquery-ui/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE CSS TEMPLATE - START -->
        <link href="{{asset('backend/assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('backend/assets/css/responsive.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('backend/assets/css/custom.css')}}" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS TEMPLATE - END -->

    </head>
    <!-- END HEAD -->



    @yield('content')

    @include('backend.common.includes.script')

    @yield('page-js')
   
    </html>
    