// Desk media queries
var template = window.template || {};
    template.mqdesk = {};

(function(mqdesk)
{

    mqdesk.init = function()
    {

        template.mq.observe('all and (max-width: 60.625em)', _handleMq);

    };

    function _handleMq(mediaQuery)
    {

        if (mediaQuery.matches) {

            // Load mobile stuff
            console.log('Below 970px');

        } else {

            //load desktop stuff
            console.log('Above 970px');
        }

    }

})(template.mqdesk);
