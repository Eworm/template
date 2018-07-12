// Lap media queries
var template = window.template || {};
    template.mqlap = {};

(function(mqlap)
{

    mqlap.init = function()
    {

        template.mq.observe('all and (max-width: 46.875em)', _handleMq);

    };

    function _handleMq(mediaQuery)
    {

        if (mediaQuery.matches) {

            // Load mobile stuff
            console.log('Below 750px');

        } else {

            //load desktop stuff
            console.log('Above 750px');

        }

    }

})(template.mqlap);
