//(function( $ ) {
//    var gMapsLoaded = false;
//    window.gMapsCallback = function(){
//        gMapsLoaded = true;
//        $(window).trigger('gMapsLoaded');
//    }
//    window.loadGoogleMaps = function(){
//        if(gMapsLoaded) return window.gMapsCallback();
//        var script_tag = document.createElement('script');
//        script_tag.setAttribute("type","text/javascript");
//        script_tag.setAttribute("src","http://maps.google.com/maps/api/js?sensor=false&callback=gMapsCallback");
//        (document.getElementsByTagName("head")[0] || document.documentElement).appendChild(script_tag);
//    }
//
//    $(document).ready(function(){
//        function initialize(){
//            var mapOptions = {
//                zoom: 8,
//                center: new google.maps.LatLng(47.3239, 5.0428),
//                mapTypeId: google.maps.MapTypeId.ROADMAP
//            };
//            map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
//        }
//        $(window).bind('gMapsLoaded', initialize);
//        window.loadGoogleMaps();
//    });

//    $(function(){
    if (typeof(_initializeGoogleMaps) == 'undefined') {
        var map, navMap, myLatlng, geocoder;

        var infowindow = new google.maps.InfoWindow({
            size: new google.maps.Size(150, 60)
        });

        function _initializeGoogleMaps(id) {
//            geocoder = new google.maps.Geocoder();
//            geocoder.geocode( { 'address': address}, function(results, status) {
//                if (status == google.maps.GeocoderStatus.OK)
//                {
////                    myLatlng = new google.maps.LatLng(results[0].geometry.location.k, results[0].geometry.location.A);
//                    myLatlng = new google.maps.LatLng(-7.3207435,112.745912);
//                }
//                else
                    myLatlng = new google.maps.LatLng(coordinate.latitude, coordinate.longitude);


//                var $map = $('<div id="map-canvas"></div>');
//                $map.appendTo('.map-canvas');
                var map_canvas = document.getElementById(id);

                var map_options = {
                    zoom:15,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(map_canvas, map_options);

                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title: "Zoom"
                });

//                google.maps.event.addListenerOnce(map, 'idle', function(){
//                    debugger;
//                    $map.height(700);
//                });

                _attachGoogleMaps();
//            });
//            debugger;
//            google.maps.event.removeListener(window, 'load', _initializeGoogleMaps);
        }

        function _attachGoogleMaps()
        {
//            $('#map-canvas').appendTo('.map-canvas');
        }
    }

//});
//})( jQuery );