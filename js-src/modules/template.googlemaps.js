// Add a google map
var template = window.template || {};
    template.googlemap = {};

(function(googlemap)
{

    googlemap.init = function()
    {

    	_setupGooglemap();

    };

    googlemap.initialize = function()
    {

        // Initialize a single marker
        var myOptions = {
            zoom: 10,
            center: new google.maps.LatLng(0, 0),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        };
        var map = new google.maps.Map(document.getElementById('js-map_address'), myOptions);
        template.googlemap.geocode(company_address, map);

    };

    googlemap.geocode = function(list, map)
    {

        // Geocode a location
        for (var i = 0; i < list.length; i++) {
            list = window[list] || list;

            var addressId = list[i].id;
            var geocoder = new google.maps.Geocoder();
            var geoOptions = {
                address: list[i].location,
                region: 'NO'
            };

            geocoder.geocode(geoOptions, template.googlemap.geocodeCallback(list[i], map, addressId));
        }

    };

    googlemap.geocodeCallback = function(item, map, addressId)
    {

        // Add a marker
        return function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                template.googlemap.addMarker(map, item, results[0].geometry.location, addressId);
            }
        }

    };

    googlemap.addMarker = function(map, item, location, addressId)
    {

        // Add a single marker
        var marker = new google.maps.Marker({
            map: map,
            position: location
        })

        var bounds = new google.maps.LatLngBounds();
        bounds.extend(location);
        map.fitBounds(bounds);

        zoomChangeBoundsListener =
        google.maps.event.addListenerOnce(map, 'bounds_changed', function(event) {
            if (this.getZoom()) {
                this.setZoom(14);
            }
        });

    };

    function _setupGooglemap()
    {

        // Add the google maps api only when we want it to via labjs
        if (jQuery('#js-map_address').length > 0) {
            $L = $L
                .script('//maps.googleapis.com/maps/api/js?key=[ADD YOUR OWN API KEY]&callback=template.googlemap.initialize').wait();
        }

    };

})(template.googlemap);
