@extends ('layouts.homepageui')

@section ('section')
    <div class="container">
        <div class="about-us">
            <h2>About Us</h2>
            <p class="font-size-17-px">{{ $aboutUs['aboutUs'] }}</p>
        </div>

        <div class="disclaimer">
            <h2>Disclaimer</h2>
            <p class="font-size-17-px">{{ $aboutUs['disclaimer']}} </p>
        </div>


        <!-- Hidden section -->
        {{--<h3>Partner</h3>--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-4">--}}
                {{--<div class="thumbnail">--}}
                    {{--<a href="/w3images/lights.jpg">--}}
                        {{--<img src="/w3images/lights.jpg" alt="Lights" style="width:100%; height: 200px;">--}}
                        {{--<div class="caption">--}}
                            {{--<p>Lorem ipsum...</p>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
                {{--<div class="thumbnail">--}}
                    {{--<a href="/w3images/nature.jpg">--}}
                        {{--<img src="/w3images/nature.jpg" alt="Nature" style="width:100%; height: 200px;">--}}
                        {{--<div class="caption">--}}
                            {{--<p>Lorem ipsum...</p>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
                {{--<div class="thumbnail">--}}
                    {{--<a href="/w3images/fjords.jpg">--}}
                        {{--<img src="/w3images/fjords.jpg" alt="Fjords" style="width:100%; height: 200px;  ">--}}
                        {{--<div class="caption">--}}
                            {{--<p>Lorem ipsum...</p>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<h3>Contact Information</h3>--}}
        <!-- End hidden section -->
    </div>
@stop