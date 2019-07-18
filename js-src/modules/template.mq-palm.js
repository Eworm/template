// Cinema media queries
var template = window.template || {};
    template.mqpalm = {};

(function(mqpalm)
{

    mqpalm.init = function()
    {

        template.mq.observe('all and (max-width: 30em)', _handleMq);

    };

    function _handleMq(mediaQuery)
    {

        if (mediaQuery.matches) {

            // Load mobile stuff
            console.log('Below 480px');

        } else {

            //load desktop stuff
            console.log('Above 480px');
        }

    }

})(template.mqpalm);
