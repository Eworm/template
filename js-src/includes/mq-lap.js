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
