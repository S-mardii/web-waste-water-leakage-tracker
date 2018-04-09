@extends ('layouts.master')

@section ('body')
    <div class="container">
        <section class="background">
            <h3>Background</h3>
            <div class="py-2">
                <p class="text-justify">
                    <strong>OD4D-Cambodia | Open Data for Development</strong> is a social project which aims to develop open source ICT platform for generating open data under crowdsourcing or citizen science approach. Our pilot is focusing specifically on generating the location of waste water leakage in Phnom Penh under the theme of environment.
                </p>
                <p class="text-justify">
                    The project idea was formed during the fascinating two-day workshop, <a href="https://techcamp.america.gov/techcamps/techcamp-cambodia/">TechCamp Cambodia - TechCamp H2.0: Supporting Healthy Waterways in the Lower Mekong</a>. This event was held on September 24-25, 2016 in Phnom Penh, Cambodia. After the event, we applied and have successfully won the grant from TechCamp Cambodia to implement our idea into real action.
                </p>
            </div>
        </section>

        {{--<section class="motto">--}}
            {{--<h3>Motto</h3>--}}
            {{--<blockquote class="blockquote">--}}
                {{--<p class="mb-0">--}}
                    {{--" <br>--}}
                    {{--Any One of <br>--}}
                    {{--Any Skill or <br>--}}
                    {{--Any Expertise can surely contribute for better environment. <br>--}}
                    {{--"--}}
                {{--</p>--}}
            {{--</blockquote>--}}
        {{--</section>--}}

        <section class="supporters pt-2">
            <div class="py-3">
                <img class="img-fluid" src="{{ asset('images/partners/techcamp.jpg') }}">
            </div>
        </section>

        {{--<div class="disclaimer">--}}
            {{--<h2>Disclaimer</h2>--}}
            {{--<p class="font-size-17-px">{{ $aboutUs['disclaimer']}} </p>--}}
        {{--</div>--}}


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