@extends ('layouts.plane')
<style>
    .header-color {
        font-size: 40px;
        margin-left: -40px;
    }

    .nav-bar-text {
        font-size: 20px;
        font-weight: bold;
    }

    .margin-left-18px {
        margin-left: -18px;
    }

    .footer-font-size {
        font-size: 22px;
    }

    .font-size-17-px {
        font-size: 17px;
    }

    .text-color {
        color: #A4C1DA;
    }

    .margin-top-25px {
        padding-top: 25px;
    }

    .margin-right-15px {
        margin-right: 15px;
    }

    .active {
        background-color: #FFFAFA;
    }
</style>
@section ('body')
    <div class="container-fluid" style="background-color:  #1C3144;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="col-lg-6 col-sm-10 col-md-6">
                        <a href="{{url("/")}}"><img src="{{URL::asset('/logo/logo.jpg')}}" alt="water waste" height="200" width="200"></a>
                    </div>
                    <div class="col-lg-6 col-sm-10 col-md-6 header-color text-color">
                        <p>Water Waste</p>
                        <p>Leakage</p>
                        <p>Tracker</p>
                    </div>
                </div>
                @if(Auth::check())
                    <div class="col-lg-6 col-md-6">
                        <div class="pull-right margin-right-15px">
                            <button name="locale" id="kh" value="kh" type="submit" class="{{(string)Session::get('language') == "kh" ? 'btn default active' : 'btn default'}}"><img src="{{URL::asset('/images/if_flag-cambodia.png')}}" alt="cambodia logo"></button>
                            <button name="locale" value="en" type="submit" class="{{(string)Session::get('language') == "en" ? 'btn default active' : 'btn default'}}"><img src="{{URL::asset('/images/if_flag-united-kingdom.png')}}" alt="united kingdom logo"></button>
                            {{--<a href="{{url("logout")}}">--}}
                                {{--<label for="login">Log out</label>--}}
                            {{--</a>--}}
                            {{--<br/>--}}
                            {{--<h4 class="pull-right" style="color: white">Welcome {{Auth::user()->name}} !!!!</h4>--}}
                        </div>
                    </div>
                @else
                    <div class="col-lg-6 col-md-6">
                        <div class="pull-right margin-right-15px">
                            <form action="language" method="post">
                                <button name="locale" id="kh" value="kh" type="submit" class="{{(string)Session::get('language') == "kh" ? 'btn default active' : 'btn default'}}"><img src="{{URL::asset('/images/if_flag-cambodia.png')}}" alt="cambodia logo"></button>
                                <button name="locale" value="en" type="submit" class="{{(string)Session::get('language') == "en" ? 'btn default active' : 'btn default'}}"><img src="{{URL::asset('/images/if_flag-united-kingdom.png')}}" alt="united kingdom logo"></button>
                                {{csrf_field()}}
                            </form>
                            <h3 class="pull-right"><a href="{{url("login")}}">
                                    <label for="login">Log in</label>
                            </a></h3>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="navbar" role="navigation" style="background: #A4C1DA;">
        {{--navbar-fixed-top--}}
        <div class="container">
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right nav-bar-text">
                    <li {{ (Request::is('/about-us') ? 'class="active"' : '') }}><a href="{{url('about-us')}}"> ABOUT US</a></li>
                    <li><a href="{{url("report")}}"> DASHBOARD</a></li>
                    @if(Auth::check())
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                {{--<li><a href="{{ url ('editprofile') }}"><i class="fa fa-user fa-fw"></i> User Profile</a>--}}
                                {{--</li>--}}
                                {{--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>--}}
                                {{--</li>--}}
                                {{--<li class="divider"></li>--}}
                                <li><a href="{{ url ('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                </li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                     @endif
                </ul>
            </div>
        </div>
    </div>

    <div>
        @yield('section')
    </div>

    {{--footer content--}}
    <footer class="page-footer center-on-small-only text-color">
        <div style="background-color:  #1C3144; margin-top: 3%">
            <div class="container mt-12  mb-12 text-md-left margin-top-25px">
                <div class="row mt-3">
                    <div class="col-md-12 col-lg-12 col-xl-12 mb-r footer-font-size">
                        <h2>Disclaimer</h2>
                        <h4>{{$aboutUs['disclaimer']}} </h4>
                        <h2>Join us</h2>
                        <div class="collapse navbar-collapse margin-left-18px">
                            <ul class="nav navbar-nav navbar-left">
                                <li><i class="fa fa-facebook-square" style="font-size:48px;color:white"></i></li>
                                <li><i class="fa fa-github" style="font-size:48px;color:white;padding-left: 15px"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-12 mb-r footer-font-size">
                        <div class="nav navbar-nav navbar-right nav-bar-text">
                            <p>Power by @<a href="http://35.198.215.226/"> Flex Team</a></p>
                            {{--<li><a class="menuLink" href="{{url("report")}}"> Flex Team</a></li>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@stop