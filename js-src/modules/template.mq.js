// Media queries
var template = window.template || {};
    template.mq = {};

(function(mq)
{

    mq.observe = function(query, callback)
    {

        const mm = window.matchMedia(query);

        mm.addListener(callback); //Execute each time media query will be reached
        callback(mm); //Execute on load

    };

})(template.mq);
