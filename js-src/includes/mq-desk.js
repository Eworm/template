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
