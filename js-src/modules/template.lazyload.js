// Lazy loading: https://www.andreaverlicchi.eu/vanilla-lazyload/
var template = window.template || {};
template.lazyload = {};

(function(lazyload) {

    let _lazyLoadInstance;

    lazyload.init = function() {

        _setupLazy();

    };

    lazyload.update = function()
    {

        if (_lazyLoadInstance)
        {
            _lazyLoadInstance.update();
        }

    };

    function _setupLazy() {

        _lazyLoadInstance = new LazyLoad({
            elements_selector: '.lazy'
        });

    };

})(template.lazyload);
