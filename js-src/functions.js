$(document).ready(function() {

// Lazy loading: add b-lazy class to the image
var bLazy = new Blazy();

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

// Palm media queries
var handleMatchMedia = function(mediaQuery) {
        if (mediaQuery.matches) {

            // Load mobile stuff
            console.log('Below 480px');

        } else {

            //load desktop stuff
            console.log('Above 480px');
        }
    },
    mqlPalm = window.matchMedia('all and (max-width: 30em)');

handleMatchMedia(mqlPalm); //Execute on load
mqlPalm.addListener(handleMatchMedia); //Execute each time media query will be reached

// Lap media queries
var handleMatchMedia = function(mediaQuery) {
        if (mediaQuery.matches) {

            // Load mobile stuff
            console.log('Below 750px');

        } else {

            //load desktop stuff
            console.log('Above 750px');
        }
    },
    mqlLap = window.matchMedia('all and (max-width: 46.875em)');

handleMatchMedia(mqlLap); //Execute on load
mqlLap.addListener(handleMatchMedia); //Execute each time media query will be reached

// Desk media queries
var handleMatchMedia = function(mediaQuery) {
        if (mediaQuery.matches) {

            // Load mobile stuff
            console.log('Below 970px');

        } else {

            //load desktop stuff
            console.log('Above 970px');
        }
    },
    mqlDesk = window.matchMedia('all and (max-width: 60.625em)');

handleMatchMedia(mqlDesk); //Execute on load
mqlDesk.addListener(handleMatchMedia); //Execute each time media query will be reached

// Wall media queries
var handleMatchMedia = function(mediaQuery) {
        if (mediaQuery.matches) {

            // Load mobile stuff
            console.log('Below 1170px');

        } else {

            //load desktop stuff
            console.log('Above 1170px');
        }
    },
    mqlWall = window.matchMedia('all and (max-width: 73.125em)');

handleMatchMedia(mqlWall); //Execute on load
mqlWall.addListener(handleMatchMedia); //Execute each time media query will be reached

// Wall media queries
var handleMatchMedia = function(mediaQuery) {
        if (mediaQuery.matches) {

            // Load mobile stuff
            console.log('Below 1170px');

        } else {

            //load desktop stuff
            console.log('Above 1170px');
        }
    },
    mqlWall = window.matchMedia('all and (max-width: 73.125em)');

handleMatchMedia(mqlWall); //Execute on load
mqlWall.addListener(handleMatchMedia); //Execute each time media query will be reached


});