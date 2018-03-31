@extends ('layouts.no-footer')
<style>
    html, body {
        height: 100%;
        margin: 0;
        overflow: hidden;
    }

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
        width: 100%;
        height: 80%;
    }

    /*#over_map { position: absolute; top: 10px; left: 10px; z-index: 99; }*/

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

@section ('body')

    {{-- search-box --}}
    @include('includes.partials.search')
    {{-- /search-box --}}

    {{-- google-map --}}
    <div class="container-fluid">
        <div class="row">
            <div id="map"></div>
        </div>
    </div>
    {{-- google-map --}}

@endsection

@push('after-scripts')
    <script>
        var server_url = window.location.origin + "/";
        var datas = {!! json_encode($maps->toArray()) !!};
    </script>

    <script src="{{ asset('js/custom-google-map.js') }}"></script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3jPeBinj-48R5SB3cLd3gT-MgtTlQXM8&callback=initMap">
    </script>
@endpush