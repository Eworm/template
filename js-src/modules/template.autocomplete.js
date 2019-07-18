// Autocomplete
var template = window.template || {};
    template.autocomplete = {};

(function(autocomplete)
{

    autocomplete.init = function()
    {

        const options = {
            url: function(phrase) {
                return `${ajaxurl}?action=wm_autocomplete&phrase=${phrase}`;
            },
            getValue: 'title',
            requestDelay: 500,
            template: {
                type: 'links',
                fields: {
                    link: 'permalink'
                }
            },
            list: {
                maxNumberOfElements: 10,
                match: {
                    enabled: true
                },
                sort: {
                    enabled: true
                }
            }
        };
        jQuery('#searchform__field').easyAutocomplete(options);

    };

})(template.autocomplete);
