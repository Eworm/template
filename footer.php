                <div class="doormat divider divider-doormat">
                
                    <div class="core core-doormat">
                    
                        <section class="vcard">
                        
                            <ul class="vcard-section adr">
                                <li class="org"><strong>Wout Mager</strong></li>
                                <li class="street-address">Folkingestraat 37B</li>
                                <li><span class="postal-code">9711 JT</span>, <span class="locality">Groningen</span></li>
                                <li class="country-name">Nederland</li>
                            </ul>
                            
                            <ul class="vcard-section">
                                <li class="url fn"><strong>Wout Mager</strong></li>
                                <li class="tel">06 - 46 41 27 70</li>
                                <li><a href="mailto:wout@woutmager.nl" class="email">wout@woutmager.nl</a></li>
                            </ul>
                            
                        </section>
                        
                    </div>
                    
                </div> <!-- .doormat -->
                
                <footer class="footer divider divider-footer" role="contentinfo">
                
                    <div class="core core-footer">
                    
                        &copy; <?php echo date("Y") ?>
                        
                    </div>
                    
                </footer> <!-- .footer -->
                
            </div> <!-- .container-transition -->
            
        </div> <!-- .container -->
        
        
        <script>
        
            // So we can use the template url in javascript
            var templateUrl = '<?php bloginfo('template_url'); ?>';
            
            // Load Google maps async only when necessary
            <?php if (is_page_template('contact.php')) { ?>
            
                // Initialize a single marker
                function initialize_single() {
                    var myOptions = {
                        zoom: 10,
                        center: new google.maps.LatLng(0, 0),
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                    };
                    var map = new google.maps.Map(document.getElementById('map_address'), myOptions);
                    codeLocations_single(company_address, map);
                }
                
                // Geocode a location
                function codeLocations_single(list, map) {
                    for (var i = 0; i < list.length; i++) {
                        list = window[list] || list;
                        var addressId = list[i].id;
                        var geocoder = new google.maps.Geocoder();
                        var geoOptions = {
                            address: list[i].location,
                            region: 'NO'
                        };
                        geocoder.geocode(geoOptions, createGeocodeCallback_single(list[i], map, addressId));
                    }
                }
                
                // Add a marker
                function createGeocodeCallback_single(item, map, addressId) {
                    return function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        addMarker_single(map, item, results[0].geometry.location, addressId);
                    } else {
                    }
                  }
                }
                
                // Add a single marker
                function addMarker_single(map, item, location, addressId) {
                    var marker = new google.maps.Marker({
                        map : map,
                        position : location,
                    });
                    var bounds = new google.maps.LatLngBounds();
                    bounds.extend(location);
                    map.fitBounds(bounds);
                    zoomChangeBoundsListener =
                    google.maps.event.addListenerOnce(map, 'bounds_changed', function(event) {
                        if (this.getZoom()){
                            this.setZoom(14);
                        }
                    });
                }
            
                // Add the google maps script
                function loadScript() {
                    var script = document.createElement('script');
                    script.type = 'text/javascript';
                    script.src = 'http://maps.googleapis.com/maps/api/js?key=AIzaSyBgU-OMTQXQwUwOyNRZB5jh1cFgY5z_L2A&sensor=false&' +
                    'callback=initialize_single';
                    document.body.appendChild(script);
                }
                window.onload = loadScript;
            
            <?php } ?>
            
        </script>
                
        <?php wp_footer(); ?>
  
  
    </body>
</html>