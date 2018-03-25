@extends('layouts.dashboard')
@section('page_heading','Dashboard')
@section('section')
    <head>
        <style>
            #map {
                height: 700px;
                width: 100%;
            }
        </style>
    </head>
    <body>

    {{--<h3>My Google Maps Demo</h3>--}}
    <div id="map"></div>

    <div class="text-center" style="margin-top: 3%">
        {{$datas->links()}}
    </div>
    <script>
        function initMap() {
            // var pp = {lat: 47.06976, lng: 15.43154};
            var pp = {lat: 11.5304365, lng: 104.9125004};
            var datas = {!! json_encode($maps->toArray()) !!};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: pp
            });
            var marker, i;
            var locations = [];

            datas.forEach(function (data) {
                locations.push([
                    data.lat,
                    data.lng,
                    data.id,
                    data.condition_id
                ])
            });

            var icon_url = window.location.origin + "/marker/";
            var color_marker = ["red.png","yellow.png","green.png"];
            for (i = 0; i < locations.length; i++) {
                var url = icon_url + color_marker[locations[i][3] - 1];

                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][0], locations[i][1]),
                    map: map,
                    icon: url
                });
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        console.log(i);
                    }
                })(marker, locations[i][2]));
            }

        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3jPeBinj-48R5SB3cLd3gT-MgtTlQXM8&callback=initMap">
    </script>
    </body>
@stop
