// Lazy loading: add b-lazy class to the image
var template = window.template || {};
    template.blazy = {};

(function(blazy)
{

    var _blazy;

    blazy.init = function()
    {

    	_setupBlazy();

    };

    blazy.revalidate = function()
    {

        if (_blazy)
        {

            _blazy.revalidate();

        }

    };

    blazy.load = function(e)
    {

        if (_blazy)
        {

            _blazy.load(e);

        }

    };

    function _setupBlazy()
    {

    	_blazy = new Blazy();

    };

})(template.blazy);
