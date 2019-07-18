// Wall media queries
var template = window.template || {};
    template.mqwall = {};

(function(mqwall)
{

    mqwall.init = function()
    {

        template.mq.observe('all and (max-width: 73.125em)', _handleMq);

    };

    function _handleMq(mediaQuery)
    {

        if (mediaQuery.matches) {

            // Load mobile stuff
            console.log('Below 1170px');

        } else {

            //load desktop stuff
            console.log('Above 1170px');
        }

    }

})(template.mqwall);
