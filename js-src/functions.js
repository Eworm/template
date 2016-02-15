$(document).ready(function() {


    // Optimize scrolling
    (function() {
    
        var timer;
        $(window).on('scroll resize', function () {
            $('html').addClass('avoid-clicks');
            clearTimeout(timer);
            timer = setTimeout(refresh, 150 );
        });
        var refresh = function () {
            $('html').removeClass('avoid-clicks');
        };
        
    })();
    

    // Animation class
    setTimeout(function() {
    
        $('html').addClass('start-animatin');
        
    }, 50);


    // Show initial password
    $('#LoginPassword').hideShowPassword({
        show: true
    });
    // Toggle password
    $('#show-password').on('change', function () {
        // When the '#show-password' checkbox changes its value,
        // set the visibility of the password field to whatever
        // its 'checked' attribute is.
        $('#LoginPassword').hideShowPassword(
            $(this).prop('checked')
        );
    });


    // Close the menu when clickin' on the content
    $('html').on('click', '#js-content-toggle', function(e) {
    
        e.preventDefault();
        closeMenu('js-toggle-menu', 'js-active-menu');
        $(this).remove();
        
    });


    // Function to open the menu
    function openMenu(toggleClass, activeClass, contentToggle, scrollTop) {
        $('html').addClass(toggleClass);
    };


    // Function to close the menu
    function closeMenu(toggleClass, activeClass) {
        $('html').removeClass(toggleClass);
    };
    
    
    // Get categories via AJAX (if we have the browsersupport)
    $('.js-catitem').on('click', function(e) {
        
        var catId = $(this).attr('id');
        var catUrl = $(this).attr('href');
        var cat = $(this).data('category');
        var pageTitle = document.title;
        
        cat_ajax_get(catId, cat, pageTitle);
        push(catId, cat, catUrl, pageTitle);
        
        e.preventDefault();
      
    });
    
    function cat_ajax_get(catId, cat, pageTitle) {
    
        $('.js-catitem').removeClass('current-cat');
        $('#' + catId).addClass('current-cat');
        
        $('.main-content').addClass('thinkin');
        
        jQuery.ajax({
            type: 'POST',
            url: templateAdminAjax,
            data: {
                'action': 'load-filter',
                cat: cat
            },
            success: function(response) {
                
                // Change HTML
                $('.main-content').html(response).promise().done(function(){
                    setTimeout(function() {
                        $('.main-content').removeClass('thinkin');
                    }, 100);
                });

                return false;
            }
        });
    }


    // Set the push state    
    function push (catId, cat, catUrl, pageTitle) {
        history.pushState({
            id: cat,
            current: catId
        }, pageTitle, catUrl);
    }
    
    // Catch the back button
    window.addEventListener('popstate', function(e) {
    
        var state = e.state;
        var current = e.current;
    
        if (state) {
            cat_ajax_get(state.current, state.id, location.pathname);
        }

    });
    
    
    // The initial state
    history.replaceState({
        catId: '',
        catUrl: '',
    }, null, location.pathname);
        
    
    // Commentform validation
    $('#commentform').parsley();
    
    
    // Small media queries
    var handleMatchMediaSmall = function (mediaQuery) {
        if (mediaQuery.matches) {
        
            // Add functions for small screens here
        
        } else {
            
            // Remove small bindings
            
        }
    },
    mql = window.matchMedia('all and (max-width: 750px)');

    handleMatchMediaSmall(mql);                  //Execute on load
    mql.addListener(handleMatchMediaSmall);      //Execute each time media query will be reached
    
    
    // Large media queries
    var handleMatchMediaLarge = function (mediaQuery) {
        if (mediaQuery.matches) {
        
            // Add functions for large screens here
        
        } else {
            
            // Remove large bindings
            
        }
    },
    mql = window.matchMedia('all and (min-width: 750px)');

    handleMatchMediaLarge(mql);                  //Execute on load
    mql.addListener(handleMatchMediaLarge);      //Execute each time media query will be reached


});


// Initialize a single marker
function initialize_single() {
    var myOptions = {
        zoom: 10,
        center: new google.maps.LatLng(0, 0),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    };
    var map = new google.maps.Map(document.getElementById('js-map_address'), myOptions);
    codeLocations_single(company_address, map);
}

// Geocode a location
function codeLocations_single(list, map) {
    for (var i = 0; i < list.length; i++) {
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
function createGeocodeCallback_single(item, map, addressId) {
    return function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
        addMarker_single(map, item, results[0].geometry.location, addressId);
    } else {
    }
  }
}

// Add a single marker
function addMarker_single(map, item, location, addressId) {
    var marker = new google.maps.Marker({
        map : map,
        position : location,
    });
    var bounds = new google.maps.LatLngBounds();
    bounds.extend(location);
    map.fitBounds(bounds);
    zoomChangeBoundsListener =
    google.maps.event.addListenerOnce(map, 'bounds_changed', function(event) {
        if (this.getZoom()){
            this.setZoom(14);
        }
    });
}
