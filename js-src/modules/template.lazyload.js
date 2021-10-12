// Lazy loading: https://www.andreaverlicchi.eu/vanilla-lazyload/
var template = window.template || {};
template.lazyload = {};

(function(lazyload) {

    let _lazyLoadInstance;

    lazyload.init = function() {

        _setupLazy();

    };

    lazyload.update = function() {

        if (_lazyLoadInstance) {
            _lazyLoadInstance.update();
        }

    };

    function _setupLazy() {

        // Use native lazyloading if available
        // Use the javascript solution otherwise
        // Remember to set image width & height!
        // https://web.dev/browser-level-image-lazy-loading/
        if ('loading' in HTMLImageElement.prototype) {
            const images = document.querySelectorAll('img[loading="lazy"]');
            images.forEach(img => {
                if (img.dataset.src) {
                    img.src = img.dataset.src;
                }
                if (img.dataset.srcset) {
                    img.srcset = img.dataset.srcset;
                }
            });
        } else {
            _lazyLoadInstance = new LazyLoad({
                elements_selector: '.lazy'
            });
        }


    };

})(template.lazyload);
