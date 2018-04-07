function mapLayout() {

}

function initMap() {
    // var pp = {lat: 47.06976, lng: 15.43154};
    var pp = {lat: 11.5750526, lng: 104.9491128};

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: pp
    });

    var locations = []

    var marker, i

    reports.forEach(function (report) {
        locations.push([
            report.lat,
            report.lng,
            report.id,
            report.condition_id
        ])
    });

    var content_info;

    /**
     * Define Marker Color
     * @type {Array}
     */
    var markers = locations.map(function (location, i) {

        var marker_icon = server_url + "marker/"
        var condition_id = location[3]

        switch (condition_id) {
            case 1:
                marker_icon += 'green.png';
                break;
            case 2:
                marker_icon += 'yellow.png';
                break;
            case 3:
                marker_icon += 'red.png';
                break;
        }

        marker = new google.maps.Marker({
            position: new google.maps.LatLng(location[0], location[1]),
            map: map,
            icon: marker_icon
        });

        /**
         * onClick on Markers
         */
        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                window.location.replace(server_url + 'report/show/' + i);
            }
        })(marker, locations[i][2]));

        /**
         * onHover on Markers
         */
        google.maps.event.addListener(marker, 'mouseover', (function (marker, i) {
            return function () {
                var image_url = server_url + reports[i].image_url;
                var content = '<img src="' + image_url + '" alt="water waste" height="200" width="200">';
                content_info = new google.maps.InfoWindow({
                    content: content
                });

                content_info.open(map, marker);
            }
        })(marker, i));

        /**
         * onHover on mouseOut
         */
        google.maps.event.addListener(marker, 'mouseout', (function (marker, i) {
            return function () {
                content_info.close();
            }
        })(marker, location[2]));

        return marker;
    });

    var markerCluster = new MarkerClusterer(map, markers, {
        imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
    });
}