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
