@extends('layouts.plane')
@section('body')
    <style>
        .active {
            color: #010210;
            background: #DEEEC8;
        }
        .logo {
            height: 50px;
            width: 50px;
            margin-left: 50px;
        }
    </style>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background: #A4C1DA;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                </button>

                <a href="{{url("/")}}"><img src="{{URL::asset('/logo/logo.jpg')}}" alt="water waste" class="logo"></a>

            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ url ('editprofile') }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        {{--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>--}}
                        {{--</li>--}}
                        <li class="divider"></li>
                        <li><a href="{{ url ('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li {{ (Request::is('/report') ? 'class="active"' : '') }}>
                            <a href="{{ url ('report') }}"><i class="fa fa-dashboard fa-fw"></i> Report</a>
                        </li>
                        <li {{ (Request::is('/map') ? 'class="active"' : '') }}>
                            <a href="{{ url ('map') }}"><i class="fa fa-sitemap fa-fw"></i> Map</a>
                        </li>
                        <li {{ (Request::is('/poster') ? 'class="active"' : '') }}>
                            <a href="{{ url ('poster') }}"><i class="fa fa-user fa-fw"></i> Poster</a>
                        </li>
                        @if(Auth::check() && Auth::user()->role_id == 1)
                            <li {{ (Request::is('/user') ? 'class="active"' : '') }}>
                                <a href="{{ url ('user') }}"><i class="fa fa-user fa-fw"></i> User</a>
                            </li>
                            <li {{ (Request::is('/setting') ? 'class="active" style="background-color: red;"'  : '') }}>
                                <a href="{{ url ('setting/1') }}"><i class="fa fa-key"></i> Setting</a>
                            </li>
                        @endif


                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                @yield('section')

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@stop

