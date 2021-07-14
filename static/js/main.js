jQuery(function() {


    jQuery('.header .cross').click(function() {
        jQuery('.menu-holder').removeClass('active');
    });

    jQuery('.menu-icon').click(function() {
        jQuery('.menu-holder').addClass('active');
    });

    jQuery('.footer .bottom .background').parallax({
        imageSrc: '/wp-content/themes/mout/static/img/footer.jpg'
    });
    jQuery('.block.gray').parallax({
        imageSrc: '/wp-content/themes/mout/static/img/bg-green.png'
    });
    jQuery('.block.blue').parallax({
        imageSrc: '/wp-content/themes/mout/static/img/bg-blue.png'
    });

    jQuery('.parallax').each(function() {
        jQuery(this).parallax({
            imageSrc: this.getAttribute('data-image')
        });
    });

    jQuery('.language-chooser').click(function() {
        jQuery('.language-chooser .mout-dropdown').toggleClass('open');
    });

    jQuery('.banner-logo').click(function() {
        jQuery('html, body').animate({
            scrollTop: jQuery("section.light").first().offset().top
        }, 1500);
    });


});
