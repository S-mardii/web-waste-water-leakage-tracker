@extends ('layouts.homepageui')
<style>
    .bottom-right {
        position: absolute;
        bottom: 90px;
        z-index: 100;
        width: 87%;
        padding-left: 90px;
    }

    .top-right {
        position: absolute;
        bottom: 350px;
        z-index: 100;
        width: 57%;
        height: 8%;
        font-size: 200%;
        padding-left: 10px;
    }

    #map {
        height: 800px;
        width: 100%;
    }

    a.center-cropped img {
        height: 100%;
        min-width: 100%;
        left: 50%;
        position: relative;
        transform: translateX(-50%);
    }

    .center-cropped {
        height: 300px;
        background-position: center center;
        background-repeat: no-repeat;
    }
</style>
{{--{{dd(session('search')[3])}}--}}
@section ('section')
    <div class="container" style="color: #A4C1DA;">
        <h3>Map</h3>
        <div class="row">
            <form role="form" method="post" action="{{url('/')}}">
                {{csrf_field()}}
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                    <label for="exampleInputEmail1">Area</label>
                    <select class="form-control form-group col-xs-10 col-sm-4 col-md-4 col-lg-4" id="area"
                            name="area_id">
                        <option value="0">All</option>
                        @foreach ($areas as $area)
                            <option value="{{$area->id}}" {{session('search')[0]== $area->id ? 'selected' : ''}}>{{$area->area}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                    <label for="exampleInputEmail1">Condition</label>
                    <select class="form-control form-group col-xs-10 col-sm-4 col-md-4 col-lg-4" id="condition"
                            name="condition_id">
                        <option value="0">All</option>
                        @foreach ($conditions as $condition)
                            <option value="{{$condition->id}}" {{session('search')[1]== $condition->id ? 'selected' : ''}}>{{$condition->condition}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                    <label for="fromdate">Form</label>
                    <input class="form-control" type="date" value="<?php if (session('search')[2]!= null) {echo date(session('search')[2]);} else {echo date('Y-m-d');}?>" name="from">
                </div>
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                    <label for="todate">To</label>
                    <input class="form-control" type="date" value="<?php if (session('search')[3]!= null) {echo date(session('search')[3]);} else {echo date('Y-m-d');}?>" name="to">
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span> Search
                    </button>
                </div>
                <div class="clearfix"></div>
            </form>
            <div class="clearfix"></div>
        </div>
        {{--<h3>My Google Maps Demo</h3>--}}
        <div id="map"></div>

        <div style="text-align: center">
            <h3>Download</h3>
            <a href="{{ route('export.file',['type'=> $search == "0" ? "csv" : "csv-search"]) }}">
                <button type="button" style="padding: 15px 40px" class="btn btn-default">CSV</button>
            </a>
            <a href="{{ route('export.file',['type'=> $search == "0" ? "xls" : "xls-search"]) }}">
                <button type="button" style="padding: 15px 40px" class="btn btn-default">Excel xls</button>
            </a>
            <a href="{{ route('export.file',['type'=> $search == "0" ? "xlsx" : "xlsx-search"]) }}">
                <button type="button" style="padding: 15px 40px" class="btn btn-default">Excel xlsx</button>
            </a>
            <button type="button" onclick="mapLayout()" style="padding: 15px 40px" class="btn btn-default">Map</button>
            <a href="{{ url('download-image',['type'=> $search == "0" ? "image" : "image-search"]) }}">
                <button type="button" style="padding: 15px 40px" class="btn btn-default">JPEG</button>
            </a>
        </div>
        <br>
        @if($datas->items() != [])
            @foreach ($datas as $key=>$data)
                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="thumbnail">
                        <a href="#" class="d-block mb-4 center-cropped">
                            <div class="center-cropped">
                                <img class="img-fluid img-thumbnail" src="{{$data->image_url}}"
                                     alt="{{$data->image_url}}" style="z-index: 1"/>
                            </div>
                            <div class="bottom-right" style="height: 5%; width: 86%; background: {{$data->color}}";>
                            </div>
                            <div class="top-right">
                                @if($data->status_id == 1 )
                                    <i class="fa fa-check-circle"></i>
                                @elseif ($data->status_id == 2)
                                    <i class="fa fa-ban"></i>
                                @else
                                    <i class="fa fa-question-circle"></i>
                                @endif
                            </div>
                        </a>
                        <div class="caption">
                            <p>{{str_limit($data->description, 37)}} <br><strong>Created at:{{($data->created_at)}}</strong></p>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
    <div class="text-center">
        {{$datas->links()}}
    </div>
    @endif

    <script>
        var server_url = window.location.origin + "/";
        var datas = {!! json_encode($maps->toArray()) !!};

        function mapLayout() {

        }

        function initMap() {
            // var pp = {lat: 47.06976, lng: 15.43154};
            var pp = {lat: 11.5750526, lng: 104.9491128};

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
                    data.color
                ])
            });

            var content_info;

            var markers = locations.map(function (location, i) {


                var marker_icon = server_url + "marker/";

                if (location[3] === 1) {
                    marker_icon += "red.png"
                } else if (location[3] === 2) {
                    marker_icon += "yellow.png"
                } else {
                    marker_icon += "green.png"
                }

                console.log(i);
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(location[0], location[1]),
                    map: map,
                    icon: marker_icon
                });

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        window.location.replace(server_url + "report/show/" + i);
                    }
                })(marker, locations[i][2]));

                google.maps.event.addListener(marker, 'mouseover', (function (marker, i) {
                    return function () {
                        var image_url = server_url + datas[i].image_url;
                        var content = '<img src="' + image_url + '" alt="water waste" height="200" width="200">';
                        content_info = new google.maps.InfoWindow({
                            content: content
                        });

                        content_info.open(map, marker);
                    }
                })(marker, i));

                google.maps.event.addListener(marker, 'mouseout', (function (marker, i) {
                    return function () {
                        content_info.close();
                    }
                })(marker, location[2]));

                return marker;
            });

            var markerCluster = new MarkerClusterer(map, markers,
                {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});


        }
    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3jPeBinj-48R5SB3cLd3gT-MgtTlQXM8&callback=initMap">
    </script>
@stop