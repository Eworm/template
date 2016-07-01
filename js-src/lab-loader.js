var $L = $LAB
// .script(templateUrl + '/js/modernizr.min.js').wait()
.script('https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js').wait()
.script(templateUrl + '/js/functions.min.js').wait();

// Add google maps only when map_address exists
if (typeof map_address != 'undefined') { $L = $L
.script('http://maps.googleapis.com/maps/api/js?key=AIzaSyBgU-OMTQXQwUwOyNRZB5jh1cFgY5z_L2A&sensor=false&callback=initialize_single').wait();
}
