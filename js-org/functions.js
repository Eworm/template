/*
@codekit-prepend "onmediaquery.js", "baseliner.js"
*/


window.onload = function() {
    baseliner = new Baseliner(8);
}

$(document).ready(function() {

    // Animation class
    setTimeout(function() {
        $('html').addClass('start-animatin');
    }, 50);

    // Sniffing for android lower then 2.3
    var ua = navigator.userAgent.toLowerCase();
    var isAndroid = ua.indexOf("android") > -1;
    if(isAndroid) {
      var androidversion = parseFloat(ua.slice(ua.indexOf("android")+8)); 
      if (androidversion <= 2.3) {
          $('html').addClass('no-overflow-scroll');
      }
    }

    // Toggle the menu
    $('#menu-toggler a').on('click touchstart', function(e) {
        e.preventDefault();
        openMenu('toggle-menu','active-menu','content-toggle',true);
    });

    // Close the menu when clickin' on the content
    $('html').on('click touchstart', '#content-toggle', function(e) {
        e.preventDefault();
        closeMenu('toggle-menu','active-menu');
        $(this).remove();
    });

    // Toggle the doormat
    $('#doormat-toggler a').on('click touchstart', function(e) {
        e.preventDefault();
        openMenu('toggle-doormat','active-doormat','doormat-toggle',false);
    });

    // Close the menu when clickin' on the content
    $('html').on('click touchstart', '#doormat-toggle', function(e) {
        e.preventDefault();
        closeMenu('toggle-doormat','active-doormat');
        $(this).remove();
    });

    // Function to open something
    function openMenu(toggleClass,activeClass,contentToggle,scrollTop) {
        $('html').addClass(toggleClass);
        setTimeout(function() {
            $('html').addClass(activeClass);
            $('#container').after('<div id="' + contentToggle + '"></div>');
        }, 180);
    };

    // Function to close something
    function closeMenu(toggleClass,activeClass) {
        $('html').removeClass(toggleClass);
        setTimeout(function() {
            $('html').removeClass(activeClass);
        }, 180);
    };

    /* Responsive javascript: https://github.com/JoshBarr/js-media-queries */
    var queries = [
        {
            context: ['mobile','skinny'],
            match: function()
            {

                // Put the search in the menu
                $('#header #searchform').prependTo('#menu');

                // Add the submenu toggle
                $('.sub-menu').each(function() {
                    if($(this).parent().hasClass('current_page_ancestor')) {
                        // The submenu is open
                        $(this).before('<span class="toggle-sub toggle-sub-close"></span>');
                    } else {
                        // The submenu is closed
                        $(this).before('<span class="toggle-sub"></span>');
                    }
                    // Set the height of toggle-sub to the same height as the parent li
                    parentHeight = $('.menu-item').first().height();
                    $(this).prev().height(parentHeight);
                    $(this).prev().width(parentHeight);
                })

                // Attach click events to submenu toggle
                $('.toggle-sub').on('click', function() {
                    $(this).toggleClass('toggle-sub-close');
                    //$(this).next().toggleClass('active-sub');
                    $(this).next().toggle();
                })

                // Toggle the comments
                $('#toggle-comments').on('click touchstart', function(e) {
                    e.preventDefault();
                    $('#comments-holder').toggleClass('toggle');
                })

            }, unmatch: function()
            {

                // Put the search back
                $('#searchform').insertAfter('#logo');

                // Remove the submenu toggle
                $('.toggle-sub').remove();

            }
        },
        {
            context: ['medium','desktop'],
            match: function() {

                // Submenu
                $('.has-submenu').mouseenter(
                    function() {
                        $('.sub-menu', this).fadeIn('fast');
                    }
                ).mouseleave(
                    function() {
                        $('.sub-menu', this).fadeOut('fast');
                    }
                );

                // The map for the company address
                if (typeof company_address != 'undefined') {
                    initialize_single(company_address);
                    var bounds = new google.maps.LatLngBounds();
                }

                // Initialize a single marker
                function initialize_single(v) {
                    var myOptions = {
                    zoom: 10,
                    center: new google.maps.LatLng(0, 0),
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                };
                var map = new google.maps.Map(document.getElementById("map_address"), myOptions);
                codeLocations_single(v, map);
                }

                function codeLocations_single(list, map) {
                    for (var i = 0; i < list.length; i++) {
                        list = window[list] || list;
                        var addressId = list[i].id;
                        var geocoder = new google.maps.Geocoder();
                        var geoOptions = {
                            address: list[i].location,
                            region: "NO"
                        };
                        geocoder.geocode(geoOptions, createGeocodeCallback_single(list[i], map, addressId));
                    }
                }

                function createGeocodeCallback_single(item, map, addressId) {
                    return function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        addMarker_single(map, item, results[0].geometry.location, addressId);
                    } else {
                    }
                  }
                }

                function addMarker_single(map, item, location, addressId) {
                    var marker = new google.maps.Marker({
                        map : map,
                        position : location,
                    });
                    bounds.extend(location);
                    map.fitBounds(bounds);
                    zoomChangeBoundsListener =
                    google.maps.event.addListenerOnce(map, 'bounds_changed', function(event) {
                        if (this.getZoom()){
                            this.setZoom(14);
                        }
                    });
                }
                
            }, unmatch: function()
            {
                
                // Remove the submenu hover
                $('.menu-item').off();

            }
        }
    ];
    // Go!
    MQ.init(queries);

});