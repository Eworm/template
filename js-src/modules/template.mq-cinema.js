// Cinema media queries
var wedeka = window.wedeka || {};
    wedeka.mqcinema = {};

(function(mqcinema)
{

    mqcinema.init = function()
    {

        wedeka.mq.observe('all and (max-width: 89.375em)', _handleMq);

    };

    function _handleMq(mediaQuery)
    {

        if (mediaQuery.matches) {

            // Load mobile stuff
            console.log('Below 1430px');

        } else {

            //load desktop stuff
            console.log('Above 1430px');
        }

    }


})(wedeka.mqcinema);
