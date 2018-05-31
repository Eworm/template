// Autocomplete
var options = {
    url: function(phrase) {
        console.log(ajaxurl + '?action=wm_autocomplete&phrase=' + phrase);
        return ajaxurl + '?action=wm_autocomplete&phrase=' + phrase;
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
$('#searchform__field').easyAutocomplete(options);
