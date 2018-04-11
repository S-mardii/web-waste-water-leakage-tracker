<nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark">
    <a class="navbar-brand mb-0 h1" href="{{ route('map.index') }}">
        OD4D Cambodia: <small>Waste Water Leakage Tracker</small>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ Request::is('/') ? 'active' : null }}">
                <a class="nav-link padding-1-rem" href="{{ route('map.index') }}"><i class="fas fa-map"></i> Map <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ Request::is('data') ? 'active' : null }}">
                <a class="nav-link padding-1-rem" href="{{ route('data.index') }}"><i class="fas fa-database"></i> Open Data</a>
            </li>
            {{--<li class="nav-item {{ Request::is('team') ? 'active' : null }}">--}}
                {{--<a class="nav-link padding-1-rem" href="{{ route('team.index') }}"><i class="fas fa-users"></i> Team</a>--}}
            {{--</li>--}}
            <li class="nav-item {{ Request::is('about-us') ? 'active' : null }}">
                <a class="nav-link padding-1-rem" href="{{ route('about-us.index') }}"><i class="fas fa-info-circle"></i> About</a>
            </li>
        </ul>
    </div>
</nav>