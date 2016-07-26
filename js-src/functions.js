$(document).ready(function() {
        
    
    
    // Lazy loading: add b-lazy class to the image
    var bLazy = new Blazy();
    
    
    
    // Animation class
    setTimeout(function()
    {
        $('html').addClass('html--animation');
    }, 50);



    // Show initial password
    $('#LoginPassword').hideShowPassword(
    {
        show: true
    });
    // Toggle password
    $('#show-password').on('change', function () 
    {
        // When the '#show-password' checkbox changes its value,
        // set the visibility of the password field to whatever
        // its 'checked' attribute is.
        $('#LoginPassword').hideShowPassword(
            $(this).prop('checked')
        );
    });



    // Close the menu when clickin' on the content
    $('html').on('click', '#js-content-toggle', function(e) 
    {
    
        e.preventDefault();
        closeMenu('html--toggle-menu', 'html--active-menu');
        $(this).remove();
        
    });



    // Function to open the menu
    function openMenu(toggleClass, activeClass, contentToggle, scrollTop)
    {
        $('html').addClass(toggleClass);
    };



    // Function to close the menu
    function closeMenu(toggleClass, activeClass)
    {
        $('html').removeClass(toggleClass);
    };



    // Commentform validation
    $('#commentform').parsley();
    
        
    
    // Palm media queries
    var handleMatchMedia = function (mediaQuery)
    {
        if (mediaQuery.matches) {

            // Load mobile stuff
            console.log('Below 480px');

        } else {
            
            //load desktop stuff
            console.log('Above 480px');
        }
    },
    mqlPalm = window.matchMedia('all and (max-width: 30em)');
    
    handleMatchMedia(mqlPalm);                  //Execute on load
    mqlPalm.addListener(handleMatchMedia);      //Execute each time media query will be reached
    
    
    
    
    // Lap media queries
    var handleMatchMedia = function (mediaQuery)
    {
        if (mediaQuery.matches) {

            // Load mobile stuff
            console.log('Below 750px');

        } else {
            
            //load desktop stuff
            console.log('Above 750px');
        }
    },
    mqlLap = window.matchMedia('all and (max-width: 46.875em)');
    
    handleMatchMedia(mqlLap);                  //Execute on load
    mqlLap.addListener(handleMatchMedia);      //Execute each time media query will be reached
    
    
    
    
    // Desk media queries
    var handleMatchMedia = function (mediaQuery)
    {
        if (mediaQuery.matches) {

            // Load mobile stuff
            console.log('Below 970px');

        } else {
            
            //load desktop stuff
            console.log('Above 970px');
        }
    },
    mqlDesk = window.matchMedia('all and (max-width: 60.625em)');
    
    handleMatchMedia(mqlDesk);                  //Execute on load
    mqlDesk.addListener(handleMatchMedia);      //Execute each time media query will be reached
    
    
    
    
    // Wall media queries
    var handleMatchMedia = function (mediaQuery)
    {
        if (mediaQuery.matches) {

            // Load mobile stuff
            console.log('Below 1170px');

        } else {
            
            //load desktop stuff
            console.log('Above 1170px');
        }
    },
    mqlWall = window.matchMedia('all and (max-width: 73.125em)');
    
    handleMatchMedia(mqlWall);                  //Execute on load
    mqlWall.addListener(handleMatchMedia);      //Execute each time media query will be reached
    
    
    
    
    // Cinema media queries
    var handleMatchMedia = function (mediaQuery)
    {
        if (mediaQuery.matches) {

            // Load mobile stuff
            console.log('Below 1430px');

        } else {
            
            //load desktop stuff
            console.log('Above 1430px');
        }
    },
    mqlCinema = window.matchMedia('all and (max-width: 89.375em)');
    
    handleMatchMedia(mqlCinema);                  //Execute on load
    mqlCinema.addListener(handleMatchMedia);      //Execute each time media query will be reached


});



// Initialize a single marker
function initialize_single()
{
    var myOptions =
    {
        zoom: 10,
        center: new google.maps.LatLng(0, 0),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    };
    var map = new google.maps.Map(document.getElementById('js-map_address'), myOptions);
    codeLocations_single(company_address, map);
}



// Geocode a location
function codeLocations_single(list, map)
{
    for (var i = 0; i < list.length; i++)
    {
        list = window[list] || list;
        
        var addressId = list[i].id;
        var geocoder = new google.maps.Geocoder();
        var geoOptions = {
            address: list[i].location,
            region: 'NO'
        };
        
        geocoder.geocode(geoOptions, createGeocodeCallback_single(list[i], map, addressId));
    }
}



// Add a marker
function createGeocodeCallback_single(item, map, addressId)
{
    return function(results, status) {
        if (status == google.maps.GeocoderStatus.OK)
        {
            addMarker_single(map, item, results[0].geometry.location, addressId);
        } else {
            
        }
    }
}



// Add a single marker
function addMarker_single(map, item, location, addressId)
{
    var marker = new google.maps.Marker
    ({
        map: map,
        position: location
    })
    
    var bounds = new google.maps.LatLngBounds();
    bounds.extend(location);
    map.fitBounds(bounds);
    
    zoomChangeBoundsListener =
    google.maps.event.addListenerOnce(map, 'bounds_changed', function(event)
    {
        if (this.getZoom()) 
        {
            this.setZoom(14);
        }
    });
}
