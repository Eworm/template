import 'easy-autocomplete/dist/jquery.easy-autocomplete.js';
import '../modules/template.autocomplete.js';
import '../modules/template.googlemaps.js';
import '../modules/template.mq.js';
import '../modules/template.mq-palm.js';
import '../modules/template.mq-lap.js';
import '../modules/template.mq-desk.js';
import '../modules/template.mq-wall.js';
import '../modules/template.mq-cinema.js';

jQuery(function()
{

    const template = window.template || {};

    for (let i in template)
    {

        if ('init' in template[i]) {
            template[i].init();
        }

    }

});
