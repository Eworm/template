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


    // Sniffing for android lower then 2.3
    var ua = navigator.userAgent.toLowerCase();
    var isAndroid = ua.indexOf("android") > -1;
    
    if (isAndroid) {
    
        var androidversion = parseFloat(ua.slice(ua.indexOf("android")+8)); 
        if (androidversion <= 2.3) {
            $('html').addClass('no-overflow-scroll');
        }
        
    }
    
    
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


    // Function to open something
    function openMenu(toggleClass, activeClass, contentToggle, scrollTop) {
    
        $('html').addClass(toggleClass);
        setTimeout(function() {
            $('html').addClass(activeClass);
            $('#js-container').after('<div id="' + contentToggle + '"></div>');
        }, 180);
        
    };


    // Function to close something
    function closeMenu(toggleClass, activeClass) {
    
        $('html').removeClass(toggleClass);
        setTimeout(function() {
            $('html').removeClass(activeClass);
        }, 180);
        
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
    // $('#comment-form').parsley();


    // Responsive javascript: https://github.com/JoshBarr/js-media-queries
    var queries = [
        {
            context: ['wrist', 'palm'],
            match: function()
            {

                // Put the search in the menu
                $('#js-header #js-searchform').prependTo('#js-mainmenu');


                // Add the submenu toggle
                $('.js-sub-menu').each(function() {
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
                
                
                // Add the menu toggler
                $('.core-header').prepend('<div class="mobile-header"><span id="js-menu-toggler" class="mobile-toggler">Menu</span></div>');
                // Toggle the menu
                $('#js-menu-toggler').on('click', function() {
                    console.log('test');
                    openMenu('js-toggle-menu', 'js-active-menu', 'content-toggle', true);
                });
                

            }, unmatch: function()
            {

                // Put the search back
                $('#js-searchform').insertAfter('#js-logo');


                // Remove the submenu toggle
                $('.toggle-sub').remove();
                
                
                // Remove the mobile header
                $('.mobile-header').remove();

            }
        },
        {
            context: ['lap', 'desk', 'wall', 'cinema'],
            match: function() {

                // Submenu with hoverintent
                $('.has-submenu').hoverIntent(
                    toggleFlyout
                );
                function toggleFlyout() {
                    $(this).toggleClass('show-sub');
                }
                
                // Submenu when using tabs
                $('.has-submenu').on('focusin', function() {
                    $(this).addClass('show-sub');
                });
                
                $('.has-submenu').on('focusout', function() {
                    $(this).removeClass('show-sub');
                });
                
            }, unmatch: function()
            {
                
                // Remove the submenu hover
                $('.has-submenu').off();

            }
        }
    ];
    // Go!
    MQ.init(queries);

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
