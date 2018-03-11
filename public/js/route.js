(function () {
    "use strict";

    var map;
    var polylines = [];
    var colors = {
        'WALKING': "#00FF00",
        'DRIVING': "#FF0000",
        'TRANSIT': "#0000FF",
    };

    var init = function () {
        initMap();
        initRoutes();
    };

    var initMap = function () {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 2,
            center: new google.maps.LatLng(8,0),
            mapTypeId: 'terrain'
        });
    };

    var initRoutes = function () {
        $('#routes ul').on('click', '> li', routeClicked);
        $('#routes ul > li:first-child').click();
    };

    var routeClicked = function () {
        setMapBounds(this);
        clearPolyLines();
        drawPolyLine(this);
    };

    var setMapBounds = function (route) {
        var $route = $(route);

        $('#routes ul li.selected').removeClass('selected');
        $route.addClass('selected');

        var sw = $route.attr('data-bounds-sw');
        var ne = $route.attr('data-bounds-ne');

        map.fitBounds(
            new google.maps.LatLngBounds(
                {
                    lat: parseFloat(sw.split(',')[0]),
                    lng: parseFloat(sw.split(',')[1])
                },
                {
                    lat: parseFloat(ne.split(',')[0]),
                    lng: parseFloat(ne.split(',')[1])
                }
            )
        );
    };

    var clearPolyLines = function () {
        for (var pl in polylines) {
            polylines[pl].setMap(null);
        }

        polylines = [];
    };

    var drawPolyLine = function (route) {
        $('ol.polylines li', $(route)).each(function() {
            polylines.push(
                new google.maps.Polyline({
                    path: google.maps.geometry.encoding.decodePath($(this).text().trim()),
                    strokeColor: colors[$(this).attr('data-type')],
                    strokeWeight: 2,
                    map: map,
                    zIndex: 10000
                })
            );
        });
    };

    init();
})();
