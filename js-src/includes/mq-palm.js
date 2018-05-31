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
