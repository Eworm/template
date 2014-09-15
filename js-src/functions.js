$(document).ready(function() {


    // Optimize scrolling
    (function() {
        var timer;
        $(window).on('scroll resize',function () {
            $('html').addClass('avoid-clicks');
            clearTimeout(timer);
            timer = setTimeout( refresh , 150 );
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
    if(isAndroid) {
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
    $('html').on('click', '#content-toggle', function(e) {
        e.preventDefault();
        closeMenu('toggle-menu','active-menu');
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
    
    
    // Commentform validation
    // $('#comment-form').parsley();


    /* Responsive javascript: https://github.com/JoshBarr/js-media-queries */
    var queries = [
        {
            context: ['wrist', 'palm'],
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
                
                
                // Add the menu toggler
                $('.core-header').prepend('<div class="mobile-header"><span id="menu-toggler" class="mobile-toggler">Menu</span></div>');
                // Toggle the menu
                $('#menu-toggler').on('click', function() {
                    console.log('test');
                    openMenu('toggle-menu','active-menu','content-toggle',true);
                });
                

            }, unmatch: function()
            {

                // Put the search back
                $('#searchform').insertAfter('#logo');


                // Remove the submenu toggle
                $('.toggle-sub').remove();
                
                
                //
                $('.mobile-header').remove();

            }
        },
        {
            context: ['lap', 'desk', 'wall', 'cinema'],
            match: function() {

                // Submenu
                $('.has-submenu').on('mouseenter', function() {
                    $('.sub-menu', this).show();
                }).on('mouseleave',function() {
                    $('.sub-menu', this).hide();
                });
                
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
