// Async css loading
yepnope([{

        load: templateUrl + '/js/modernizr.min.js',
        complete: function() {
        
            //console.log('modernizr is here');
        
        }
    
    } , {

        load: 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js',
        complete: function() {
        
            //console.log('jQuery is here');
            
            if (!window.jQuery) {
                yepnope(templateUrl + '/js/jquery.min.js');
            }
            
        }

    } , {

        load: templateUrl + '/js/functions.min.js',
        complete: function() {
        
            //console.log('Functions are here!');
    
        }

}]);