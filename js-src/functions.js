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


    // Function to open the menu
    function openMenu(toggleClass, activeClass, contentToggle, scrollTop) {
    
        $('html').addClass(toggleClass);
        
/*
        $('.navchild').on('transitionend', event, function(){
            event.stopPropagation();
            console.log(event);
            //I suppose this ended the event listener for the childDiv
            $('.navchild').off('transitionend');
            
            $('#js-mainmenu')
                .on('transitionend', event, function() {
                    //why is 'opacity' being read? any way to fix this?
                    console.log(event.propertyName);
                });
        });  
*/
        
        // setTimeout(function() {
            // $('html').addClass(activeClass);
            // $('#js-container').after('<div id="' + contentToggle + '"></div>');
        // }, 280);
        
    };


    // Function to close the menu
    function closeMenu(toggleClass, activeClass) {
    
        $('html').removeClass(toggleClass);
        
        // setTimeout(function() {
            // $('html').removeClass(activeClass);
        // }, 280);
        
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


    // Responsive javascript: https://github.com/JoshBarr/js-media-queries
    var queries = [
        {
            context: ['wrist', 'palm'],
            match: function()
            {

                // Put the search in the menu
                // $('#js-header #js-searchform').prependTo('#js-mainmenu');


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
                $('#js-mainmenu').prepend('<div class="navchild mobile-header"><div id="js-menu-toggler" class="mobile-toggler">Menu<span></span></div></div>');
                
                
                // If menu-items are clickable
                $('.main-menu').find('a').on('click', function(e) {
                    if($('#js-menu-toggler').data('opening') == true) {
                        e.preventDefault();
                        console.log('preventDefault');
                    }
                });
                
                
                // 
                $('#js-mainmenu').on('transitionend', function(e) {
                    
                    setTimeout(function() {
                        // Make items clickable
                        $('#js-menu-toggler').data('opening', false);
                    }, 500);
                });
                
                // Stop bubblin'
                $('.navchild').on('transitionend', function(e) {
                    e.stopPropagation();
                });
                
                // Stop bubblin'
                $('.main-menu').on('transitionend', function(e) {
                    e.stopPropagation();
                });
                
                // Toggle the menu
                $('#js-menu-toggler').on('click touchstart', function() {
                    $(this).data('opening', true);
                    
                    if ($('html').hasClass('js-toggle-menu')) {
                        closeMenu('js-toggle-menu', 'js-active-menu');
                    } else {
                        openMenu('js-toggle-menu', 'js-active-menu', 'js-content-toggle', true);                        
                    }
                    
                });
                

            }, unmatch: function()
            {

                // Put the search back
                // $('#js-searchform').insertAfter('#js-logo');


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
